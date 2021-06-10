<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\RedirectionController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\OverlayController;

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/overlay', [OverlayController::class, 'index'])->name('overlay');

Route::prefix('admin')->group(function() {
    Route::get('overlay', [OverlayController::class, 'edit'])->name('admin.overlay');
    Route::patch('/overlay', [OverlayController::class, 'update']);

    Route::get('redirections', [RedirectionController::class, 'index'])->name('admin.redirections');
    Route::prefix('redirections')->group(function() {
        Route::get('create', [RedirectionController::class, 'create'])->name('admin.redirections.create');
        Route::post('create', [RedirectionController::class, 'store']);

        Route::get('{redirection}/edit', [RedirectionController::class, 'edit'])->name('admin.redirections.edit');
        Route::patch('{redirection}/edit', [RedirectionController::class, 'update']);
        Route::delete('{redirection}/delete', [RedirectionController::class, 'destroy'])->name('admin.redirections.delete');
    });

    Route::get('posts', [PostsController::class, 'index'])->name('admin.posts');
    Route::prefix('posts')->group(function() {
        Route::get('create', [PostsController::class, 'create'])->name('admin.posts.create');
        Route::post('create', [PostsController::class, 'store']);

        Route::get('{post}/edit', [PostsController::class, 'edit'])->name('admin.posts.edit');
        Route::patch('{post}/edit', [PostsController::class, 'update']);
        Route::delete('{post}/delete', [PostsController::class, 'destroy'])->name('admin.posts.delete');
    });

    Route::get('users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::prefix('users')->group(function() {
        Route::prefix('{user}')->group(function() {
            Route::post('sendVerificationEmail', [AdminUserController::class, 'sendVerificationEmail'])->name('admin.users.resendEmailVerification');
            Route::get('edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
            Route::delete('delete', [AdminUserController::class, 'destroy'])->name('admin.users.delete');
            Route::prefix('update')->group(function() {
                Route::patch('avatar', [AdminUserController::class, 'updateAvatar'])->name('admin.users.update.avatar');
                Route::patch('details', [AdminUserController::class, 'updateDetails'])->name('admin.users.update.details');
                Route::patch('password', [AdminUserController::class, 'updatePassword'])->name('admin.users.update.password');
                Route::patch('role', [AdminUserController::class, 'updateRole'])->name('admin.users.update.role');
            });
        });
    });
});