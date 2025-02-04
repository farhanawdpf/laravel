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
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestudentsRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('index')
                         ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestudentsRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('index')
                        ->with('success','student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('index')
                        ->with('success','Student deleted successfully');
    }

}
