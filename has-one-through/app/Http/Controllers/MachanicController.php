<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Mechanic;
use App\Models\Owner;

class MachanicController extends Controller
{
    public function index () { 
        $mechanics = Mechanic::with('carOwner')->get();
        // return ($mechanics);
        return view('home', compact('mechanics'));
    }
}
