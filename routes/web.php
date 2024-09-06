<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PhoneController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('students.index');
});

Route::get('students_excel', [StudentController::class, 'excel'])->name('students.excel');

Route::resource('students', StudentController::class);

Route::resource('phones', PhoneController::class);
