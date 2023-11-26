<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\StudentDetail;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::find(1)->studentDetail;
        dd($students);
        return view('students', compact('student'));
    }


    public function store(Request $request) {
    $student =  Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone
    ]);

    $student->studentDetail()->create([
        'alternate_phone' => $request->alternate_phone,
        'course' => $request->course,
        'roll_no' => $request->roll_no,
    ]);

    return redirect('students')->with('message','Added Successfully');
   }


public function destroy(Student $student)
{
    $student->delete();
    return redirect('students')->with('message','Daleted Successfully');
}

// public function destroy(Student $student)
// {
//     $student->studentDetail()->delete();
//     $student->delete();
//     return redirect('students')->with('message','Daleted Successfully');
// }
}

