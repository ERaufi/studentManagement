<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SessionDemoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TeachersMiddleware;
use App\Models\Classes;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('student')->controller(StudentController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index');
    Route::view('add', 'students.add');
    Route::post('create', 'create');
    Route::get('edit/{id}', 'edit');
    Route::post('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});

Route::prefix('teachers')->controller(TeachersController::class)->middleware('teachers')->group(function () {
    Route::get('/', 'index');
    Route::view('add', 'students.add');
    Route::post('create', 'create');
    Route::get('edit/{id}', 'edit');
    Route::post('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});

Route::prefix('classes')->controller(ClassesController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('add', 'create');
    Route::post('create', 'store');
    Route::get('edit/{id}', 'edit');
    Route::post('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});

Route::get('users', [UserController::class, 'index']);
Route::get('subjects', [SubjectsController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/session', [SessionDemoController::class, 'index'])->name('session.demo');
