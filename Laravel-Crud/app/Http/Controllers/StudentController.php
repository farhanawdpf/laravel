<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();
        // dd($students->toArray());
        return view('index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        student::create($request->only([
            'name',
            'email',
        ]));
        // dd($request->all());

        // $student = new student;
        // $student->firstname = $request->firstname;
        // $student->lastname = $request->lastname;
        // $student->email = $request->email;
        // $student->save();
        return Redirect::to('/');
    }


    public function show(student $student)
    {
        //
    }

    public function edit(student $student)
    {
        //
    }

    public function update($student_id)
    {
        $student = student::find($student_id);
        return view('edit',compact('student'));
    }
    public function editStore(Request $request)
    {
       $student = student::find($request->student_id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
        return Redirect::to('/');
    }
    public function destroy(Request $request)
    {
        $student = student::find($request->student_id);
        $student->delete();
        return Redirect::to('/');
    }



}
