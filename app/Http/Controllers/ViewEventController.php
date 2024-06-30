<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Models\Event;
use DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ViewEventController extends Controller
{
    public function view($id)
    {
        // Fetch the event by id
        $event = DB::table('events')->where('event_id', $id)
            ->select('event_id', 'name', 'startdate', 'enddate', 'starttime', 'endtime', 'company', 'campus_id', 'marks10', 'marks12', 'cgpa', 'role', 'responsibility',  'registration_date', 'last_date_of_registration')
            ->first();

        if (!$event) {
            abort(404, 'Event not found.');
        }

        // Fetch all events for categorization
        $events = Event::all();

        // Get the current date and time
        $now = Carbon::now();

        // Categorize events
        $upcomingEvents = $events->filter(function ($event) use ($now) {
            return $event->startdate > $now;
        });

        $liveEvents = $events->filter(function ($event) use ($now) {
            return $event->startdate <= $now && $event->enddate >= $now;
        });

        $archivedEvents = $events->filter(function ($event) use ($now) {
            return $event->enddate < $now;
        });

        // Fetch data from criterias table
        $criteria = DB::table('criterias')->where('event_id', $id)
            ->select('event_id', 'marks10', 'marks12', 'cgpa', 'program_id')
            ->first();

        if (!$criteria) {
            abort(404, 'Criteria not found.');
        }

        // Fetch students matching criteria
        $students = DB::table('students')
            ->where('T1', '>=', $criteria->marks10)
            ->where('T2', '>=', $criteria->marks12)
            ->where('cgpa', '>=', $criteria->cgpa)
            ->where('program_id', $criteria->program_id)
            ->get();

        return view('adminside.ViewEvent', [
            'criteria' => $criteria,
            'students' => $students,
            'event' => $event,
            'upcomingEvents' => $upcomingEvents,
            'liveEvents' => $liveEvents,
            'archivedEvents' => $archivedEvents
        ]);
    }
}
