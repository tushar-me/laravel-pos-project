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

Route::get('/registration', [UserController::class, 'UserRegistration'])->name('userRegistration');
Route::post('/registration', [UserController::class, 'UserStore'])->name('userStore');