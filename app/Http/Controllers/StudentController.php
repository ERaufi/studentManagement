<?php

namespace App\Http\Controllers;

use App\Events\StudentRegisteredEvent;
use App\Http\Requests\StudentAddRequest;
use App\Models\Images;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //
    public function index(Request $request)
    {
        $students = Student::with('images')
            ->when($request->search, function ($query) use ($request) {
                return $query->whereAny([
                    'name',
                    'age',
                    'email',
                    'date_of_birth',
                    'score',
                    'gender'
                ], 'like', '%' . $request->search . '%');
            })->paginate(10);
        // return Student::with('grades')
        //     ->withCount('grades')
        //     ->withMax('grades', 'grade')
        //     ->withMin('grades', 'grade')
        //     ->withSum('grades', 'grade')
        //     ->withAvg('grades', 'grade')
        //     ->get();
        return view('students.index', compact('students'));
    }


    public function create(StudentAddRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('photos', 'public');
        }

        $student = new Student();
        // $student->user_id = 2;
        // $student->class_id = 42;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->score = $request->score;
        // $student->image = $imagePath;
        $student->save();


        event(new StudentRegisteredEvent($student));



        if ($request->hasFile('image')) {
            $images = new Images();
            $images->path = $imagePath;
            $images->imageable_id = $student->id;
            $images->imageable_type = Student::class;
            $images->save();
        }

        session()->flash('success', 'student created successfully');


        return redirect('student');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        Gate::authorize('updateStudents', $student);

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        Gate::authorize('updateStudents', $student);


        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->score = $request->score;
        $student->update();

        session()->flash('success', 'student updated successfully');

        return redirect('student');
    }

    public function destroy(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }

        $student->delete();

        session()->flash('success', 'student deleted successfully');

        return redirect('student');
    }
}
