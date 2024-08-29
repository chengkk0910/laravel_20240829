<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('students.index');
});


Route::resource('students', StudentController::class);
