<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    //
    public function index()
    {
        $subject = Subjects::with('grades')->get();
    }
}
