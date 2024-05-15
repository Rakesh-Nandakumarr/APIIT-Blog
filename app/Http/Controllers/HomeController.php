<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $events = [];
 
        $eventlist = Event::all();
 
        foreach ($eventlist as $event) {
            $events[] = [
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }
 
        return view('events', compact('events'));
    }
}
