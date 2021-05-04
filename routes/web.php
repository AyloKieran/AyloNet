<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/user', [UserController::class, 'index'])->name('user');

require __DIR__.'/auth.php';

require __DIR__.'/admin/admin.php';

Route::get("{path}", "App\Http\Controllers\PageController@serve")->where('path', '.+');


if(env('FORCE_HTTPS'))
{
    URL::forceScheme('https');
}
