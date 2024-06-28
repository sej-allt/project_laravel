<?php
namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Models\Event;
use DB;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function event()
    {
        return view('eventForm');
    }

    public function storeEvent(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'event_id' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'startdate' => 'required|date',
                'enddate' => 'required|date|after_or_equal:startdate',
                'starttime' => 'required',
                'endtime' => 'required|after:starttime',
                'marks10' => 'required|string|max:255',
                'marks12' => 'required|string|max:255',
                'cgpa' => 'required|string|max:255',
                'campus_id' => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'responsibility' => 'required|string|max:1000',
                'program_id' => 'required|string|max:1000',
                'registration_date' => 'required|date',
                'last_date_of_registration' => 'required|date|after_or_equal:registration_date',
            ]);

            // Create a new event with the validated data
            $event = Event::create([
                'event_id' => $request->input('event_id'),
                'name' => $request->input('name'),
                'startdate' => $request->input('startdate'),
                'enddate' => $request->input('enddate'),
                'starttime' => $request->input('starttime'),
                'endtime' => $request->input('endtime'),
                'marks10' => $request->input('marks10'),
                'marks12' => $request->input('marks12'),
                'cgpa' => $request->input('cgpa'),
                'campus_id' => $request->input('campus_id'),
                'company' => $request->input('company'),
                'role' => $request->input('role'),
                'responsibility' => $request->input('responsibility'),
                'program_id' => $request->input('program_id'),
                'registration_date' => $request->input('registration_date'),
                'last_date_of_registration' => $request->input('last_date_of_registration'),
            ]);

            $criteria = Criteria::create([
                'event_id' => $request->input('event_id'),
                'marks10' => $request->input('marks10'),
                'marks12' => $request->input('marks12'),
                'cgpa' => $request->input('cgpa'),
                'campus_id' => $request->input('campus'),
                'program_id' => $request->input('program_id'),
            ]);

            return redirect()->route('create_event')->with('success', 'Event Created successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing event: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while storing the event. Please try again.');
        }
    }

    public function checkeligibletable()
    {
        $student_id = session('student_id');
        $eventids = DB::table('eligibles')->where('student_id', '=', $student_id)->get();
        $events = [];
        foreach ($eventids as $event_id) {
            $event = DB::table('events')->where('event_id', '=', $event_id->event_id)->first();
            $events[] = $event;
        }
        return view('userside.events')->with('events', $events);
    }
}
