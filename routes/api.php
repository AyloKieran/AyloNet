<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\VersionController;
use App\Http\Controllers\Api\CalendarController;
use App\Http\Controllers\Api\NowPlayingController;
use App\Http\Controllers\Api\OverlayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('version', [VersionController::class, 'serve']);

Route::get('calendar-events', [CalendarController::class, 'serve']);
Route::get('nowplaying', [NowPlayingController::class, 'serve']);
Route::get('overlay', [OverlayController::class, 'serve']);
