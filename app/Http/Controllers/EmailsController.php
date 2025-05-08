<?php

namespace App\Http\Controllers;

use App\Jobs\ResultsJob;
use App\Models\User;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    //
    public function welcomeEmail()
    {

        $students = User::where('user_type', 'student')
            ->limit(10)
            ->get();

        foreach ($students as $student) {
            ResultsJob::dispatch($student->email);
        }

        return 'email sent succesfully';
    }
}
