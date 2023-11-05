<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // public function index () {  
    //     $products = DB::table('product')->get();
    //     dd($products);
 
    //     return view('product', ['products' => $products]);
    // }

    public function index () {  
        $products = DB::table('product')
        ->join('contact','contact.id','product.contact_id')
        ->select('product.*',
        'contact.name as contactName',
        'contact.contact as phone'
        )
        ->get();
        // dd($products);
 
        return view('product', ['products' => $products]);
    }
}
