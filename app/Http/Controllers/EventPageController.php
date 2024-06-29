<?php

namespace App\Http\Controllers;

use App\Models\EventPage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventPageController extends Controller
{
    public function index()
    {
        // Retrieve upcoming events
        $upcomingEvents = EventPage::where('startdate', '>', Carbon::now()->toDateString())
            ->orWhere(function($query) {
                $query->where('startdate', '=', Carbon::now()->toDateString())
                      ->where('starttime', '>', Carbon::now()->toTimeString());
            })
            ->get();

        // Retrieve live events
        $liveEvents = EventPage::where('startdate', '<=', Carbon::now()->toDateString())
            ->where('enddate', '>=', Carbon::now()->toDateString())
            ->get();

        // Retrieve archived events
        $archivedEvents = EventPage::where('enddate', '<', Carbon::now()->toDateString())
            ->get();

        return view('events.index', compact('upcomingEvents', 'liveEvents', 'archivedEvents'));
    }
    public function archive()
    {
        // Retrieve archived events
        $archivedEvents = EventPage::where('enddate', '<', Carbon::now()->toDateString())->get();
        
        return view('events.archive', compact('archivedEvents'));
    }
    
    public function show($id)
    {
        $event = EventPage::findOrFail($id);
        
        // Retrieve archived events
        $archivedEvents = EventPage::where('enddate', '<', Carbon::now()->toDateString())
            ->get();
        
        return view('events.show', compact('event', 'archivedEvents'));
    }
}
