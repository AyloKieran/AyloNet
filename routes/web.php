<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Posts\PostsTagController;
use App\Http\Controllers\Posts\PostsAuthorController;

Route::get('/', function () {return view('index');})->name('home');

Route::get("/posts", [PostsController::class, 'index'])->name('posts');
Route::get("/posts/tag/{tag}", [PostsTagController::class, 'index'])->name('tagPosts');
Route::get("/posts/author/{user}", [PostsAuthorController::class, 'index'])->name('authorPosts');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact']);

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::prefix('user')->group(function() {
    Route::post('resendEmailVerification', [UserController::class, 'sendVerificationEmail'])->name('user.resendEmailVerification');
    Route::delete('delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::prefix('update')->group(function() {
        Route::patch('avatar', [UserController::class, 'updateAvatar'])->name('user.update.avatar');
        Route::patch('details', [UserController::class, 'updateDetails'])->name('user.update.details');
        Route::patch('password', [UserController::class, 'updatePassword'])->name('user.update.password');
    });

});

require __DIR__.'/auth.php';

require __DIR__.'/admin/admin.php';

Route::get("{path}", [PageController::class, 'serve'])->where('path', '.+');


if(env('FORCE_HTTPS'))
{
    URL::forceScheme('https');
}
