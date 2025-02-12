<?php

use App\Http\Controllers\SecondTestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('about-us', function () {
//     return view('aboutus');
// });


Route::view('contact-us', 'contactus');

Route::controller(StudentController::class)->group(function () {
    Route::get('students', 'index');
    Route::get('about-us', 'aboutUs');
});

Route::get('invoke', TestController::class);

Route::resource('second-test', SecondTestController::class);
