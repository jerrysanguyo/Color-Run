<?php

use App\Http\Controllers\Auth\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AccountController::class, 'loginIndex'])->name('login.index');
Route::post('/login/authentication', [AccountController::class, 'loginAuthenticate'])->name('login.store');
Route::get('/registration', [AccountController::class, 'registerIndex'])->name('register.index');
Route::post('/registration/store', [AccountController::class, 'register'])->name('register.store');
Route::get('/account/confirmation/{user}', [AccountController::class, 'confirmationIndex'])->name('confirmation.index');
Route::post('/account/confirmation/{user}/confirm', [AccountController::class, 'confirm'])->name('confimation.store');