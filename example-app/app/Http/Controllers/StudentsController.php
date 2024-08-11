<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StorestudentsRequest;
use App\Http\Requests\UpdatestudentsRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        // dd($students->toArray());
        return view('index',compact('students'));
    }


}
