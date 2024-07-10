<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function adminView()
    {
        return view('admin.calendar');
    }

    public function userView()
    {
        return view('user.calendar');
    }

    public function getEvents()
    {
        $events = Event::all();

        return response()->json($events);
    }

    public function addEvent(Request $request)
    {
        $event = Event::create([
            'title' => $request->title,
            'start' => $request->start,
        ]);

        return response()->json($event);
    }
}
