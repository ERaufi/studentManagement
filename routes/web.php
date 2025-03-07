<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('student')->controller(StudentController::class)->group(function () {
    Route::get('/', 'index');
});
