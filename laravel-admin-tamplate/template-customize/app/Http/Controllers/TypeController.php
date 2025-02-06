<?php

namespace App\Http\Controllers;
use App\Models\Type;
use App\Models\SubType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index () {
        $types = Type::all();
        // dd($types);
        return view('pages.one-to-one.type_list', compact('types'));
    }
}
