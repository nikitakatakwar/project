<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// user detail page
Route::get('addStudent', [RegisterController::class, 'addStudent']);
// display form
Route::get('form', [RegisterController::class, 'form'])->name('add');
// save data of users
Route::post('saveData', [RegisterController::class, 'saveData'])->name('saveData');
