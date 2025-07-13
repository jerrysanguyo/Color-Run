<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Models\Participant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $total = Participant::count();
    return view('welcome', compact('total'));
})->name('welcome');

Route::resource('participants', ParticipantController::class);
Route::get('/participant/search', [HomeController::class, 'search'])->name('participant.search');
Route::get('/participant/generate-qr', [ParticipantController::class, 'generateIndex'])->name('generateQr.index');
Route::post('/participant/generate-qr/check', [ParticipantController::class, 'generateQr'])->name('generateQr.check');
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