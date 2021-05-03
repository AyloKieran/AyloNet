<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RedirectionController;

Route::get('/admin', [AdminController::class, 'index'])->name('admin');


Route::get('/admin/redirections', [RedirectionController::class, 'index'])->name('admin.redirections');
Route::get('/admin/redirections/create', [RedirectionController::class, 'create'])->name('admin.redirections.create');
Route::post('/admin/redirections/create', [RedirectionController::class, 'store']);

Route::get('/admin/redirections/{redirection}/edit', [RedirectionController::class, 'edit'])->name('admin.redirections.edit');
Route::patch('/admin/redirections/{redirection}/edit', [RedirectionController::class, 'update']);
Route::delete('/admin/redirections/{redirection}/delete', [RedirectionController::class, 'destroy'])->name('admin.redirections.delete');