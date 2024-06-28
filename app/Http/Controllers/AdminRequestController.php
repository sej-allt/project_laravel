<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\update_approvals;

class AdminRequestController extends Controller
{

     public function showUpdateForm()
    {
            $message = "Your request has been sent.";
        return view('updateUserDetails.updateMarks', compact('message'));
    }


    public function index()
    {
        //Retrieve data from the update_approvals table using the UpdateApproval model
    //    $data = DB::table('update_approvals')
    //         ->where('delete', 0)
    //         ->get();

            $data = DB::table('update_approvals')
    ->join('grades', 'update_approvals.grade_id', '=', 'grades.grade_id')
    ->select('update_approvals.*', 'grades.grade_name')
   ->where('update_approvals.delete', 0) 
    ->get();


    // $data = DB::table('update_approvals')
    //     ->join('grades', 'update_approvals.grade_id', '=', 'grades.id')
    //     ->select('update_approvals.*', 'grades.grade_name')
    //     ->get();

    // return view('viewRequests', ['data' => $data]);

        // Pass the data to the 'viewRequests' view
       return view('viewRequests', compact('data'));
    }


   
// }

public function store(Request $request)
{
    $request->validate([
        'class' => 'required',
        'new_marks' => 'required',
        'pdf_document' => 'required|file|mimes:pdf|max:10240', // Max file size is 10MB
    ]);

    $file = $request->file('pdf_document');
    $fileName = $file->getClientOriginalName();

    // // Store the uploaded file
    // $path = $file->storeAs('markspdf', $fileName, 'public');
      $path = $file->storeAs('public', $fileName);

    // Get student ID from session
    $studentId = session('student_id');

    // Get class and new marks from request
    $class = $request->input('class');
    $newMarks = $request->input('new_marks');

    // Determine the column name based on the class
    $columnName = '';
    switch ($class) {
        case 'Class 10':
            $columnName = 'T1';
            break;
        case 'Class 12':
            $columnName = 'T2';
            break;
             case '1st Semester':
            $columnName = 'T3';
            break;
        case '2nd Semester':
            $columnName = 'T4';
            break;
        case '3rd Semester':
            $columnName = 'T5';
            break;
        case '4th Semester':
            $columnName = 'T6';
            break;
        case '5th Semester':
            $columnName = 'T7';
            break;
        case '6th Semester':
            $columnName = 'T8';
            break;
        case '7th Semester':
            $columnName = 'T9';
            break;
        case '8th Semester':
            $columnName = 'T10';
            break;
        case '9th Semester':
            $columnName = 'T11';
            break;
        case '10th Semester':
            $columnName = 'T12';
            break;
        
    }

    // Insert a new record into the update_approvals table
    DB::table('update_approvals')->insert([
        'stu_id' => $studentId,
        'grade_id'=> $columnName,
        //$columnName => $newMarks,
        'filepath' => $path, // Use $path instead of $filePath
        'updates' => $newMarks,
        'delete' => '0'
    ]);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Your request has been sent to admin');
}
}