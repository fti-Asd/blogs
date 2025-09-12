<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {
    Route::controller(DashboardController::class)->middleware('auth:admin')->group(function () {
        Route::get('', 'index')->name('dashboard');
        Route::get('/dashboard', 'index')->name('dashboard');

        Route::get('/export-excel', 'getSiteVisitsExcel')->name('get-site-visits-excel');
        Route::get('/chart-data', 'getSiteVisitsChart')->name('chart-visits-site-get');
    });

    Route::prefix('auth')->as('auth.')->group(function () {
        Route::prefix('login')->as('login.')->middleware('guest:admin')->controller(LoginController::class)->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'post')->name('post');
        });

        Route::middleware('auth:admin')->get('logout', [LogoutController::class, 'logout'])->name('logout');
    });

    Route::prefix('user')->as('user.')->middleware('auth:admin')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('index');

        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');

        Route::prefix('{userId}')->group(function () {
            Route::get('show', [UserController::class, 'show'])->name('show');

            Route::get('edit', [UserController::class, 'edit'])->name('edit');
            Route::put('update', [UserController::class, 'update'])->name('update');

            Route::delete('delete', [UserController::class, 'delete'])->name('delete');
        });
    });
});
