<?php

namespace App\Http\Controllers;
use App\Models\phone;
use App\Models\User;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index()
    {
 
        $users = phone::find(1);
        $users = phone::find(1)->user;
        $users = User::all();
        // return $users;
        return view('home', compact('users'));
    }
}
