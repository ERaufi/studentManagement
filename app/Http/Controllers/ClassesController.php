<?php

namespace App\Http\Controllers;

use App\Models\Classes;
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
}
