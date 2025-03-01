<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    public function addData()
    {

        $item = new Student();
        $item->name = 'tester';
        $item->email = 'tester@gmail.com';
        $item->age = 25;
        $item->date_of_birth = '2010-01-01';
        $item->gender = 'f';
        $item->score = 66;
        $item->save();

        // DB::table('students')->insert([
        //     [
        //         'name' => 'testerasdfa',
        //         'email' => 'tester2222@gmail.com',
        //         'age' => 15,
        //         'date_of_birth' => '2010-01-01',
        //         'gender' => 'f'
        //     ],
        //     [
        //         'name' => 'abbb',
        //         'email' => 'sss@gmail.com',
        //         'age' => 15,
        //         'date_of_birth' => '2010-01-01',
        //         'gender' => 'f'
        //     ],
        //     [
        //         'name' => 'sdfsdf',
        //         'email' => 'xx@gmail.com',
        //         'age' => 15,
        //         'date_of_birth' => '2010-01-01',
        //         'gender' => 'f'
        //     ]
        // ]);

        return 'added successfully';
    }

    public function getData()
    {
        // $items = DB::table('students')
        //     ->avg('score');

        $items = Student::find(55);

        return $items;
    }

    public function updateData()
    {
        // DB::table('students')->where('id', 203)->update([
        //     'name' => 'updated Name',
        //     'age' => 20,
        //     'email' => 'updated-email@test.com'
        // ]);

        $item = Student::find(55);
        $item->name = 'updated student';
        $item->age = 10;
        $item->update();


        return 'Updated Successfully';
    }

    public function deleteData()
    {
        // DB::table('students')->where('id', '>', 203)->delete();

        Student::findOrFail(57)->delete();

        return 'Deleted Successfully';
    }

    public function whereConditions()
    {
        // $items = Student::where('age', '>', 18)
        //     ->orWhere('score', '>=', 50)
        //     ->get();

        // $items = Student::where('score', '>=', 50)
        //     ->where(function ($query) {
        //         $query->where('age', '<', 20)
        //             ->orWhere('age', '>', 30);
        //     })
        //     ->get();

        // $items = Student::whereBetween('age', [18, 25])->get();
        // $items = Student::whereNotBetween('age', [18, 25])->get();


        // $items = Student::whereNotIn('id', [1, 2, 3, 4, 5])->get();


        // $items = Student::where('age', 25)
        //     ->orWhere('score', 25)
        //     ->get();

        // $items = Student::whereAny(['age', 'score'], 25)
        //     ->get();


        // $items = Student::where('age', 25)
        //     ->where('score', 25)
        //     ->where('id', 25)
        //     ->get();

        $items = Student::whereAll(['age', 'score', 'id'], 25)
            ->get();

        return $items;
    }
}
