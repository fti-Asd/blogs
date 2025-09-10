<?php

use App\Http\Controllers\Account\CommentsController;
use App\Http\Controllers\Account\LikedNewsController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::prefix('news')->as('news.')->controller(NewsController::class)->group(callback: function () {
    Route::get('/', 'index')->name('index');

    Route::prefix('{newsId}')->group(function () {
        Route::get('/show', 'show')->name('show');

        Route::post('post-comment', 'postComment')->name('post-comment');
        Route::post('post-reply-comment/{commentId}', 'postReplyComment')->name('comment-reply-post');
    });

    Route::post('like', 'like')->name('like');
});

Route::prefix('account')->as('account.')->middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/delete-account', [ProfileController::class, 'delete'])->name('delete-account');

    Route::get('/liked-news', [LikedNewsController::class, 'likedNews'])->name('liked-news');
    Route::get('/edit-like-news/{id}', [LikedNewsController::class, 'update'])->name('edit-like-news');

    Route::get('/comments', [CommentsController::class, 'comments'])->name('comments');
});


