<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () { 
        $category = Category::with('product')->get();
        // return ($category);
        return view('home', compact('category'));
    }
}
