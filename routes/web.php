<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 
| 
|
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', [UserController::class, 'userRegistration'])->name('userRegistration');
Route::post('/registration', [UserController::class, 'userStore'])->name('userStore');

Route::get('/login', [UserController::class, 'userLogin'])->name('userLogin');
Route::post('/login', [UserController::class, 'userAuthenticate'])->name('userAuthenticate');