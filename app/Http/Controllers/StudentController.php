<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    public function index(Request $request)
    {
        $students = Student::when($request->search, function ($query) use ($request) {
            return $query->whereAny([
                'name',
                'age',
                'email',
                'date_of_birth',
                'score',
                'gender'
            ], 'like', '%' . $request->search . '%');
        })->get();
        return view('students.index', compact('students'));
    }
}
