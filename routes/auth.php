<?php

use App\Http\Controllers\Auth\GoogleOAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/login', [GoogleOAuthController::class, 'redirect'])->name('login');
Route::get('/auth/google/callback', [GoogleOAuthController::class, 'callback']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
