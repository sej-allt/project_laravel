<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    //
    public function event()
    {
        return view('eventForm');
    }


    public function storeEvent(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());

        // dd($request);
        try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate',
            'starttime' => 'required',
            'endtime' => 'required|after:starttime',
            'marks10' => 'required|string|max:255',
            'marks12' => 'required|string|max:255',
            'cgpa' => 'required|string|max:255',
            'campus' => 'required|string|max:255',
        ]);

        $event = Event::create([
            'name' => $request->input('name'),
            'startdate' => $request->input('startdate'),
            'enddate' => $request->input('enddate'),
            'starttime' => $request->input('starttime'),
            'endtime' => $request->input('endtime'),
            'marks10' => $request->input('marks10'),
            'marks12' => $request->input('marks12'),
            'cgpa' => $request->input('cgpa'),
            'campus' => $request->input('campus'),
        ]);

        return redirect()->route('create_event')->with('success', 'Event Created successful!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while storing the event. Please try again.');
    }
    }


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