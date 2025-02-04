<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StorestudentsRequest;
use App\Http\Requests\UpdatestudentsRequest;
class Teacher extends Controller
{
    public function index () {
        $students = Student::all();
        dd($students->toArray());
        return view('index',compact('students'));
    }
}
