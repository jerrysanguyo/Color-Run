<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AccountController::class, 'loginIndex'])->name('login.index');
Route::post('/login/authentication', [AccountController::class, 'loginAuthenticate'])->name('login.store');
Route::get('/registration', [AccountController::class, 'registerIndex'])->name('register.index');
Route::post('/registration/store', [AccountController::class, 'register'])->name('register.store');
Route::get('/account/confirmation/{user}', [AccountController::class, 'confirmationIndex'])->name('confirmation.index');
Route::post('/account/confirmation/{user}/confirm', [AccountController::class, 'confirm'])->name('confimation.store');

Route::middleware(['auth'])
    ->group(function () {
        Route::middleware('role:superadmin')
            ->prefix('sa')
            ->name('superadmin.')
            ->group(function () {
                Route::post('/logout', [AccountController::class, 'logout'])->name('logout');
                Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
            });
        
        Route::middleware('role:admin')
            ->prefix('ad')
            ->name('admin.')
            ->group(function () {
                Route::post('/logout', [AccountController::class, 'logout'])->name('logout');
                Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
            });
        
        Route::middleware('role:user')
            ->prefix('us')
            ->name('user.')
            ->group(function () {
                Route::post('/logout', [AccountController::class, 'logout'])->name('logout');
                Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
            });
    });