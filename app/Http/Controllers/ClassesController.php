<?php

namespace App\Http\Controllers;

use App\Events\AsignToClassEvent;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teachers;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    //
    public function index()
    {
        $classes = Classes::with('teacher')->get();
        return view('Class.index', compact('classes'));
    }

    public function create()
    {
        $teachers = Teachers::all();
        return view('Class.add', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $item = new Classes();
        $item->teacher_id = $request->teacher_id;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->save();

        return redirect('/classes')->with('success', 'Class created successfully');
    }

    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        $teachers = Teachers::all();
        return view('Class.edit', compact('class', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);

        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $class->teacher_id = $request->teacher_id;
        $class->name = $request->name;
        $class->description = $request->description;
        $class->update();

        return redirect('/classes')->with('success', 'Class updated successfully');
    }

    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();
        return redirect('/classes')->with('success', 'Class deleted successfully');
    }



    public function assignStudent($class_id)
    {
        //
        $students = Student::all();
        $class = Classes::where('id', $class_id)->first();
        return view('Class.AssignStudent', compact('class', 'students'));
    }

    public function assignStudentClass(Request $request)
    {
        $student = Student::where('id', $request->student_id)->first();
        $student->class_id = $request->class_id;
        $student->update();

        event(new AsignToClassEvent('you have been added to new class', $student->user_id));

        return redirect('/classes')->with('success', 'Student Assigned Successfully');
    }
}
