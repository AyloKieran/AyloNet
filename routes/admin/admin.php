<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\RedirectionController;

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::prefix('admin')->group(function() {
    Route::get('redirections', [RedirectionController::class, 'index'])->name('admin.redirections');
    Route::prefix('redirections')->group(function() {
    Route::get('create', [RedirectionController::class, 'create'])->name('admin.redirections.create');
    Route::post('create', [RedirectionController::class, 'store']);

    Route::get('{redirection}/edit', [RedirectionController::class, 'edit'])->name('admin.redirections.edit');
    Route::patch('{redirection}/edit', [RedirectionController::class, 'update']);
    Route::delete('{redirection}/delete', [RedirectionController::class, 'destroy'])->name('admin.redirections.delete');
    });

    Route::get('users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::prefix('users')->group(function() {
        Route::get('{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    });
});