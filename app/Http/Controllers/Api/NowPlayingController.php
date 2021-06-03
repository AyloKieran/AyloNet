<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Spatie\NowPlaying\NowPlaying;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class NowPlayingController extends Controller
{
    public function serve()
    {
        $nowplaying = new NowPlaying(env('LASTFM_API_KEY'));
        $track = $nowplaying->getTrackInfo('aylokieran');

        if($track) {
            return $track;
        } else {
            return "{}";
        }
    }
}