<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Students::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|numeric',
            'email' => 'required|email',
        ]);
        $input = $request->all();
        Students::create($input);
        return redirect()->route('students.index');
    }

    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $this->validate($requests, [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $input = $request->all();
        $student->fill($input)->save();

        return redirect()->route('students.index');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return view('students.destroy', compact('student'));
    }
}
