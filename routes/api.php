<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\PostController;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Protected routes — require JWT token
    Route::middleware('auth:api')->group(function () {
        Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/post/list', [PostController::class, 'index'])->name('post.list');
        Route::get('/post/{post}/show', [PostController::class, 'show'])->name('post.details');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

        Route::post('/logout', [AuthController::class, 'logout']);
        
        // Example: get current logged-in user
        Route::get('/currentuser', [AuthController::class, 'getCurrentUser']);
    });
});
