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
    //    $data = DB::table('students')
    //        ->get();

          
    $programs = DB::table('programs')->pluck('program_id')->toArray();
    $students = DB::table('students')->get(); // Assuming you have a students table to fetch student data
    return view('adminside.liststudents', ['programs' => $programs, 'data' => $students]);



        // Pass the data to the 'viewRequests' view
        //return view('', compact('data'));
    }
}

