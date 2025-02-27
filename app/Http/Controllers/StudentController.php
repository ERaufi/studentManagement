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
}
