<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
use App\Models\Classes;
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

Route::prefix('teachers')->controller(TeachersController::class)->group(function () {
    Route::get('/', 'index');
    Route::view('add', 'students.add');
    Route::post('create', 'create');
    Route::get('edit/{id}', 'edit');
    Route::post('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});

Route::get('classes', [ClassesController::class, 'index']);
Route::get('users', [UserController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
