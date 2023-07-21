<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("student.index", ['students' => Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return (view("student.create"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:students,email,'],
            'password' => ['required'],
        ]);

        $date = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ];

        $its_created = Student::create($date);

        if ($its_created) {
            return back()->with(['success' => " information is upload"]);
        } else {
            return back()->with(['failure' => "information is failed"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            "student" => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $student->id . ',id'],

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,

        ];

        $is_updated = $student->update($data);

        if ($is_updated) {
            return back()->with(['success' => "information has been uploaded"]);
        } else {
            return back()->with(['failure' => "information has failed to uploaded"]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $is_deleted = $student->delete();

        if ($is_deleted) {
            return back()->with(['success' => "Magic has been spelled!"]);
        } else {
            return back()->with(['failure' => "Magic has failed to spell!"]);
        }
    }
}
