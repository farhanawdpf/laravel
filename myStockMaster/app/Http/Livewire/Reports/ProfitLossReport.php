<?php

declare(strict_types=1);

namespace App\Http\Livewire\Reports;

use App\Models\Expense;
use App\Models\Purchase;
use App\Models\PurchasePayment;
use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnPayment;
use App\Models\Sale;
use App\Models\SalePayment;
use App\Models\SaleReturn;
use App\Models\SaleReturnPayment;
use Livewire\Component;

class ProfitLossReport extends Component
{
    public $start_date;

    public $end_date;

    public $total_sales;

    public $sales_amount;

    public $total_purchases;

    public $purchases_amount;

    public $total_sale_returns;

    public $sale_returns_amount;

    public $total_purchase_returns;

    public $purchase_returns_amount;

    public $expenses_amount;

    public $profit_amount;

    public $payments_received_amount;

    public $payments_sent_amount;

    public $payments_net_amount;

    protected $rules = [
        'start_date' => 'required|date|before:end_date',
        'end_date'   => 'required|date|after:start_date',
    ];

    public function mount(): void
    {
        $this->start_date = '';
        $this->end_date = '';
        $this->total_sales = 0;
        $this->sales_amount = 0;
        $this->total_sale_returns = 0;
        $this->sale_returns_amount = 0;
        $this->total_purchases = 0;
        $this->purchases_amount = 0;
        $this->total_purchase_returns = 0;
        $this->purchase_returns_amount = 0;
        $this->payments_received_amount = 0;
        $this->payments_sent_amount = 0;
        $this->payments_net_amount = 0;
    }

    public function render()
    {
        $this->setValues();

        return view('livewire.reports.profit-loss-report');
    }

    public function generateReport()
    {
        $this->validate();
    }

    public function setValues()
    {
        $this->total_sales = Sale::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->count();

        $this->sales_amount = Sale::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('total_amount') / 100;

        $this->total_purchases = Purchase::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->count();

        $this->purchases_amount = Purchase::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('total_amount') / 100;

        $this->total_sale_returns = SaleReturn::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->count();

        $this->sale_returns_amount = SaleReturn::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('total_amount') / 100;

        $this->total_purchase_returns = PurchaseReturn::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->count();

        $this->purchase_returns_amount = PurchaseReturn::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('total_amount') / 100;

        $this->expenses_amount = Expense::when($this->start_date, function ($query) {
            return $query->whereDate('date', '>=', $this->start_date);
        })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('amount') / 100;

        $this->profit_amount = $this->calculateProfit();

        $this->payments_received_amount = $this->calculatePaymentsReceived();

        $this->payments_sent_amount = $this->calculatePaymentsSent();

        $this->payments_net_amount = $this->payments_received_amount - $this->payments_sent_amount;
    }

    public function calculateProfit()
    {
        $revenue = $this->sales_amount - $this->sale_returns_amount;

        $sales = Sale::completed()
            ->when($this->start_date, fn ($query) => $query->whereDate('date', '>=', $this->start_date))
            ->when($this->end_date, fn ($query) => $query->whereDate('date', '<=', $this->end_date))
            ->with('saleDetails')->get();

        $productCosts = 0;

        foreach ($sales as $sale) {
            foreach ($sale->saleDetails as $saleDetail) {
                // Assuming you have a warehouses relationship defined on the Product model
                $productWarehouse = $saleDetail->product->warehouses->where('warehouse_id', $this->warehouse_id)->first();

                if ($productWarehouse) {
                    $productCosts += $productWarehouse->cost * $saleDetail->quantity;
                }
            }
        }

        return $revenue - $productCosts;
    }

    public function calculatePaymentsReceived()
    {
        $sale_payments = SalePayment::when($this->start_date, function ($query) {
            return $query->whereDate('date', '>=', $this->start_date);
        })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('amount') / 100;

        $purchase_return_payments = PurchaseReturnPayment::when($this->start_date, function ($query) {
            return $query->whereDate('date', '>=', $this->start_date);
        })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('amount') / 100;

        return $sale_payments + $purchase_return_payments;
    }

    public function calculatePaymentsSent()
    {
        $purchase_payments = PurchasePayment::when($this->start_date, function ($query) {
            return $query->whereDate('date', '>=', $this->start_date);
        })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('amount') / 100;

        $sale_return_payments = SaleReturnPayment::when($this->start_date, function ($query) {
            return $query->whereDate('date', '>=', $this->start_date);
        })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('amount') / 100;

        return $purchase_payments + $sale_return_payments + $this->expenses_amount;
    }
}