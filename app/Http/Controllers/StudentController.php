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
        // 1. Retrieve students older than 18.
        $students1 = Student::where('age', '>', 18)->get();

        // 2. Retrieve female students with a score of at least 50.
        $students2 = Student::where('gender', 'f')
            ->where('score', '>=', 50)
            ->get();

        // 3. Retrieve students whose name contains "John" or whose score is greater than 80.
        $students3 = Student::where('name', 'like', '%John%')
            ->orWhere('score', '>', 80)
            ->get();

        // 4. Retrieve students with a score of at least 50 and whose age is either less than 20 or greater than 30.
        $students4 = Student::where('score', '>=', 50)
            ->where(function ($query) {
                $query->where('age', '<', 20)
                    ->orWhere('age', '>', 30);
            })
            ->get();

        // 5. Retrieve students whose age is between 18 and 25.
        $students5 = Student::whereBetween('age', [18, 25])->get();

        // 6. Retrieve students whose score is NOT between 30 and 70.
        $students6 = Student::whereNotBetween('score', [30, 70])->get();

        // 7. Retrieve students with IDs in [1, 2, 3].
        $students7 = Student::whereIn('id', [1, 2, 3])->get();

        // 8. Retrieve students with IDs NOT in [4, 5, 6].
        $students8 = Student::whereNotIn('id', [4, 5, 6])->get();

        // 9. Retrieve students that do not have a date of birth.
        $students9 = Student::whereNull('date_of_birth')->get();

        // 10. Retrieve students that have a date of birth set.
        $students10 = Student::whereNotNull('date_of_birth')->get();

        // 11. Retrieve students created today.
        $students11 = Student::whereDate('created_at', now()->toDateString())->get();

        // 12. Using whereAny: Search the 'name' and 'email' columns with OR logic.
        $search = 'example';
        $students12 = Student::whereAny(
            ['name', 'email'],
            'LIKE',
            "%{$search}%"
        )->get();

        // 13. Using whereAll: Search the 'name' and 'email' columns with AND logic.
        $searchAll = 'test';
        $students13 = Student::whereAll(
            ['name', 'email'],
            'LIKE',
            "%{$searchAll}%"
        )->get();

        // 14. Using nestedWhere (new in Laravel 12):
        // Retrieve students with score greater than 0 and (age > 25 OR gender = 'f').
        $students14 = Student::where('score', '>', 0)
            ->nestedWhere('age', '>', 25, 'or', 'gender', 'f')
            ->get();

        // Return all the results (for example purposes)
        return [
            'students1'  => $students1,
            'students2'  => $students2,
            'students3'  => $students3,
            'students4'  => $students4,
            'students5'  => $students5,
            'students6'  => $students6,
            'students7'  => $students7,
            'students8'  => $students8,
            'students9'  => $students9,
            'students10' => $students10,
            'students11' => $students11,
            'students12' => $students12,
            'students13' => $students13,
            'students14' => $students14,
        ];
    }
}
