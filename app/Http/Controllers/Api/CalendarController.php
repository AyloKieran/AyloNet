<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function serve()
    {
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addDays(1);

        $calendars = [
            'kieran.nobletec@gmail.com'
        ];

        $events = new Collection();

        foreach($calendars as $calendar) {
            $calendarEvents = Event::get($startDate, $endDate, [], $calendar);
            $events = $events->merge($calendarEvents);
        }

        $processedEvents = $events->map(function($event){
            $processedEvent = array();

            $processedEvent = Arr::add($processedEvent, 'id', $event->id);
            $processedEvent = Arr::add($processedEvent, 'title', $event->summary);
            $processedEvent = Arr::add($processedEvent, 'start', $event->start->dateTime);
            $processedEvent = Arr::add($processedEvent, 'end', $event->end->dateTime);
            $processedEvent = Arr::add($processedEvent, 'calendar', $event->organizer->displayName);

            return $processedEvent;
        });

        return $processedEvents->sortBy('start')->values()->all();

    }
}