<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () { 
        $category = User::with('student')->get();// many to many
        return ($category);
        return view('home', compact('category'));
    }
}
