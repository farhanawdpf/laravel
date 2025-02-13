<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function index () {
        $mechanic = Mechanic::with('carOwner')->get();//has-one-through

        // return $mechanic;

        return view('pages.has-one-through.manage_mechanic', compact('mechanic'));
    }
}
