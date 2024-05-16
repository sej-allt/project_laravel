<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EventController extends Controller
{
    public function checkeligibletable()
    {
        $student_id = session('student_id');
        $eventids = DB::table('eligibles')->where('student_id', '=', $student_id)->get();
        $events = [];
        foreach ($eventids as $event_id) {
            $event = DB::table('events')->where('id', '=', $event_id->event_id)->first();
            $events[] = $event;
        }
        // dd($events);
        return view('userside.events')->with('events', $events);
    }
}
