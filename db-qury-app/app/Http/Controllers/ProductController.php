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

    public function create() {
        return view('add-product');
    }

    public function addProduct(Request $request)
    {
        $products = DB::table('product')
        ->insert(
            [
                'name' => $request->name,
                'contact_id' => $request->contact_id,
                'details' => $request->details,
            ]
        );
        if($products) { 
            return redirect()->route('product'); 
        }
    }

    public function singleProduct($id) { 
        $products = DB::table('product')->where('id',$id)->get();
        return view('product',['products' => $products]);
    }

    public function deleteProduct($id) { 
        $products = DB::table('product')->where('id',$id)->delete();
        if($products) { 
            return redirect()->route('product'); 
        }
    }


}
