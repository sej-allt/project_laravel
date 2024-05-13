<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\update_approvals;

class AdminRequestController extends Controller
{

    //  public function showUpdateForm()
    // {
    //         $message = "Your request has been sent.";
    //     return view('updateUserDetails.updateMarks', compact('message'));
    // }

    public function  updatereqtable(Request $request)
    {
             $validatedData = $request->validate([
            'student_id' => 'required',
            'class' => 'required',
            'new_marks' => 'required',
            'password' => 'required',
        ]);


         $studentId = $request->input('student_id');
        $class = $request->input('class');
         $new_marks = $request->input('new_marks');
        $password = $request->input('password');

        $user=DB::table('logins')
        ->where('stu_id',$studentId)
        ->first();
        if(!$user)
        {
            return redirect()->back()->with('error', 'User not found');
        }
        if($user->password !=md5($password))
        {
            return redirect()->back()->with('error', 'Incorrect Password');

        }

          $columnName = 'marks10'; // Initialize column name variable
            
    switch ($class) {
        case 'Class 10':
            $columnName = 'marks10';
            break;
        case 'Class 12':
            $columnName = 'marks12';
            break;
        case '1st Semester':
            $columnName = 'sem1';
            break;
        case '2nd Semester':
            $columnName = 'sem2';
            break;
        case '3rd Semester':
            $columnName = 'sem3';
            break;
        case '4th Semester':
            $columnName = 'sem4';
            break;
        case '5th Semester':
            $columnName = 'sem5';
            break;
        case '6th Semester':
            $columnName = 'sem6';
            break;
        case '7th Semester':
            $columnName = 'sem7';
            break;
        case '8th Semester':
            $columnName = 'sem8';
            break;
        case '9th Semester':
            $columnName = 'sem9';
            break;
        case '10th Semester':
            $columnName = 'sem10';
            break;
        
    }
    DB::table('update_approvals')->insert([
        'stu_id' => $studentId,
        $columnName => $new_marks,
        'update_type' => $columnName ,
        'delete' => '0'
    ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your request has been sent to admin');

    }

    public function index()
    {
        // Retrieve data from the update_approvals table using the UpdateApproval model
       $data = DB::table('update_approvals')->get();
        
        // Pass the data to the 'viewRequests' view
        return view('viewRequests', compact('data'));
    }
}



