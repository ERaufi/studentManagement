<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('student')->controller(StudentController::class)->group(function () {
    Route::get('/', 'index');
    Route::view('add', 'students.add');
    Route::post('create', 'create');
    Route::get('edit/{id}', 'edit');
    Route::post('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});
