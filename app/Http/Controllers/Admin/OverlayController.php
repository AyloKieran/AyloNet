<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class OverlayController extends Controller
{
    public function __construct()
    {
        $this->middleware("can:admin");
    }

    public function index()
    {
        return view('overlay');
    }

    public function edit()
    {
        return view('admin.overlay.edit');
    }

    public function update(Request $request)
    {
        Cache::forget('overlay.scene');
        Cache::forget('overlay.components.nowplaying.shown');
        Cache::forget('overlay.components.calendar.shown');
        Cache::forget('overlay.components.chat.shown');
        Cache::forget('overlay.elements.welcometitle');
        Cache::forget('overlay.elements.welcomesubtitle');
        Cache::forget('overlay.elements.brbsubtitle');
        Cache::forget('overlay.elements.endsubtitle');
        Cache::forget('overlay.last_updated');

        Cache::rememberForever('overlay.scene', function() use ($request) {
            return $request['scene'];
        });
        Cache::rememberForever('overlay.components.nowplaying.shown', function() use ($request) {
            return $request['nowplaying'];
        });
        Cache::rememberForever('overlay.components.calendar.shown', function() use ($request) {
            return $request['calendar'];
        });
        Cache::rememberForever('overlay.components.chat.shown', function() use ($request) {
            return $request['chat'];
        });
        Cache::rememberForever('overlay.elements.welcometitle', function() use ($request) {
            return $request['WelcomeTitle'];
        });
        Cache::rememberForever('overlay.elements.welcomesubtitle', function() use ($request) {
            return $request['WelcomeSubtitle'];
        });
        Cache::rememberForever('overlay.elements.brbsubtitle', function() use ($request) {
            return $request['BRBSubtitle'];
        });
        Cache::rememberForever('overlay.elements.endsubtitle', function() use ($request) {
            return $request['EndSubtitle'];
        });
        Cache::rememberForever('overlay.last_updated', function() use ($request) {
            return Carbon::now()->getPreciseTimestamp(3);
        });

        return back();
    }
}
