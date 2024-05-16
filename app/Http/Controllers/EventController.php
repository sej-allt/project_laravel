<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndividualRegistration;

class EventController extends Controller
{
    //
    public function event(){
        return view('create_event');
    }


    public function storeEvent(Request $request){
        echo"<pre>";
        print_r($request->all());

        dd($request);
        // try {
        //     $validatedData = $request->validate([
        //         'name' => 'required|string|max:255',
        //         'startdate' => 'required|date',
        //         'enddate' => 'required|date|after_or_equal:start_date',
        //         'starttime' => 'required',
        //         'endtime' => 'required|after:start_time',
        //         'marks10' => 'required|string|max:255',
        //         'marks12' => 'required|string|max:255',
        //         'cgpa' => 'required|string|max:255',
        //         'campus' => 'required|string|max:255',
        //     ]);
    
        //     // Create a new IndividualRegistration instance
        //     $individualReg = IndividualRegistration::create([
        //         'name' => $request->input('eventname'),
        //         'startdate' => $request->input('startdate'),
        //         'enddate' => $request->input('end_date'),
        //         'starttime' => $request->input('starttime'),
        //         'endtime' => $request->input('endtime'),
        //         'marks10' => $request->input('marks10'),
        //         'marks12' => $request->input('marks12'),
        //         'cgpa' => $request->input('cgpa'),
        //         'campus' => $request->input('campus'),
        //     ]);

        //     dd($request);

        //     return redirect()->back()->with('success', 'Registration successful!');
        // } catch (\Exception $e) {
        //     Log::error('Error storing event: ' . $e->getMessage());
        //     return redirect()->back()->with('error', 'An error occurred while storing the event. Please try again.');
        // }
    }
}
