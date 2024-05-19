<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentListController extends Controller
{
    public function viewList()
    {
       return view('adminside.liststudents');
    }


     public function index()
    {
        // Retrieve data from the update_approvals table using the UpdateApproval model
       $data = DB::table('students')
           ->get();

        // Pass the data to the 'viewRequests' view
        return view('adminside.liststudents', compact('data'));
    }
}

//     public function filterStudents(Request $request)
// {
//     $programs = $request->input('programs', []);
//     $semesters = $request->input('semesters', []);

//     $query = Student::query();

//     // Apply filters
//     if (!empty($programs)) {
//         $query->whereIn('course', $programs);
//     }

//     if (!empty($semesters)) {
//         $query->whereIn('semester', $semesters);
//     }

//     $data = $query->get();

//     return view('adminside.liststudents', ['data' => $data]);
// }
// }


