<?php

// This line of code replaces the lines below.
// Route::apiResource('posts', \App\Http\Controllers\PostController::class);

use Illuminate\Support\Facades\Route;

Route::middleware([
    // 'auth',
    // \App\Http\Middleware\RedirectIfAuthenticated::class
    ])
    // ->prefix('heyaa')
    ->name('posts.')
    ->namespace('\App\Http\Controllers')
    ->group(function() {
        Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])
            ->name('index')
            ->withoutMiddleware('auth');
    
        Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])
            ->name('show')
            ->whereNumber('post');

        Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('store');

        Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('update');

        Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('destroy');

        Route::post('/posts/{post}/share', [\App\Http\Controllers\PostController::class, 'share'])->name('share');
    });