<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Teacher extends Controller
{
    public function index () { 
        $teachers = DB::table('teacher')
        ->leftjoin('class','class.id','teacher.class_id')
        ->leftjoin('students','students.id','teacher.student_id')
        ->select('teacher.*',
            'class.name as className',
            'students.name as studntname',
            'students.email')
        ->get();
        // dd($teachers);
        return view('teacher', ['teachers' => $teachers]);
    }
}
