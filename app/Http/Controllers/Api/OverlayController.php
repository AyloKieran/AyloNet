<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Arr;

class OverlayController extends Controller
{
    public function serve()
    {
        $data = array();
        $components = array();
        $elements = array();
        $nowplaying = array();
        $calendar = array();
        $chat = array();

        $data = Arr::add($data, 'scene', Cache::get('overlay.scene'));  
       
        $nowplaying = Arr::add($nowplaying, 'shown', Cache::get('overlay.components.nowplaying.shown'));
        $calendar = Arr::add($calendar, 'shown', Cache::get('overlay.components.calendar.shown'));
        $chat = Arr::add($chat, 'shown', Cache::get('overlay.components.chat.shown'));

        $components = Arr::add($components, 'nowplaying', $nowplaying);
        $components = Arr::add($components, 'calendar', $calendar);
        $components = Arr::add($components, 'chat', $chat);

        $elements = Arr::add($elements, 'welcometitle', Cache::get('overlay.elements.welcometitle'));
        $elements = Arr::add($elements, 'welcomesubtitle', Cache::get('overlay.elements.welcomesubtitle'));
        $elements = Arr::add($elements, 'brbsubtitle', Cache::get('overlay.elements.brbsubtitle'));
        $elements = Arr::add($elements, 'endsubtitle', Cache::get('overlay.elements.endsubtitle'));


        $data = Arr::add($data, 'components', $components);
        $data = Arr::add($data, 'elements', $elements);
        $data = Arr::add($data, 'last_updated', Cache::get('overlay.last_updated'));

        return $data;
    }
}