<?php

use App\Http\Controllers\SecondTestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\TestController;
use App\Models\Teachers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('teachers', function () {
//     return Teachers::all();
// });

Route::get('teachers', [TeachersController::class, 'index']);
Route::get('add-teacher', [TeachersController::class, 'add']);
Route::get('show-teacher/{id}', [TeachersController::class, 'show']);
Route::get('update-teacher/{id}', [TeachersController::class, 'update']);
Route::get('delete-teacher/{id}', [TeachersController::class, 'delete']);
