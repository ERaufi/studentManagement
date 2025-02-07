<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });





Route::get('/', function () {
    return 'hello from laravel';
});

Route::get('about', function () {
    return 'About Us';
});



Route::prefix('details')->group(function () {
    Route::get('students', function () {
        return 'this is student';
    })->name('student-Details');

    Route::get('teachers', function () {
        return 'this is teacher';
    })->name('teachers-Details');
});

Route::get('student/{id}/{reg}', function ($id, $reg) {
    return 'student number ' . $id . ' registration number ' . $reg;
});

Route::fallback(function () {
    return 'this page is no found please try again';
});
