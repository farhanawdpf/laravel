<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Bus;
class BusController extends Controller
{
    //
    public function index () {
        $buses = Ticket::with('buses')->get();//many to many
        // dd($buses);
        return view('pages.many-to-many.manage_bus', compact('buses'));
    }
}
