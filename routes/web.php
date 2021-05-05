<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {return view('index');})->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact'])->middleware('throttle:10,3');

Route::get('/user', [UserController::class, 'index'])->name('user');

require __DIR__.'/auth.php';

require __DIR__.'/admin/admin.php';

Route::get("{path}", "App\Http\Controllers\PageController@serve")->where('path', '.+');


if(env('FORCE_HTTPS'))
{
    URL::forceScheme('https');
}
