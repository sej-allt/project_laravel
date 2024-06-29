<?php
namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Models\Event;
use DB;
use Illuminate\Support\Facades\Log;

class ViewEventController extends Controller
{
    // public function view()
    // {
    //     return view('adminside.ViewEvent');

        public function view($id)
    {
        // Fetch data from criterias table
        $criteria = DB::table('criterias')->where('event_id', $id)
            ->select('event_id', 'marks10', 'marks12', 'cgpa', 'program_id')
            ->first(); // Assuming you want data for the first event_id found

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

        return view('adminside.ViewEvent', compact('criteria', 'students'));
    }
}