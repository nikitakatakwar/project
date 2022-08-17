<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

// user detail page
Route::get('addStudent', [RegisterController::class, 'addStudent'])->name('addStudent');
// display form
Route::get('form', [RegisterController::class, 'form'])->name('add');
// save data of users
Route::post('saveData', [RegisterController::class, 'saveData'])->name('saveData');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('nikitakatakwar165@gmail.com')->send(new \App\Mail\MyTestMail($details));
    return view("emails.myTestMail");
    //dd("Email is Sent.");
});

//Route::get('/', [TestController::class, 'index']);
