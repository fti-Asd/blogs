<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'index'])->name('login.index');
        Route::post('login', [LoginController::class, 'post'])->name('login.post');

        Route::get('register', [RegisterController::class, 'index'])->name('register.index');
        Route::post('register', [RegisterController::class, 'post'])->name('register.post');

        Route::get('refresh-captcha', [RegisterController::class, 'refreshCaptcha'])->name('refresh-captcha');

    });

    Route::get('logout', [LogoutController::class, 'index'])->middleware('auth:web')->name('logout.index');
});

Route::get('/send-email', [EmailController::class, 'welcomeEmail'])->middleware('auth:web')->name('send-email');
