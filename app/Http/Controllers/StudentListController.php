<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Student; // Import the Student model

class StudentListController extends Controller
{
    public function viewList()
    {
       return view('adminside.liststudents');
    }

    public function index()
    {
        $programs = DB::table('programs')->select('program_id')->get();
        $data = DB::table('students')->get(); 
        return view('adminside.liststudents', compact('programs', 'data'));
    }

    public function filterAjax(Request $request)
    {
        $query = Student::query();
    
        if ($request->filled('program_id')) {
            $query->where('program_id', $request->input('program_id'));
        }
    
        if ($request->filled('semester')) {
            $query->where('semester', $request->input('semester'));
        }
    
        if ($request->filled('marks_10')) {
            $query->where('T1', '>=', $request->input('marks_10'));
        }
    
        if ($request->filled('marks_12')) {
            $query->where('T2', '>=', $request->input('marks_12'));
        }
    
        if ($request->filled('cgpa')) {
            $query->where('cgpa', '>=', $request->input('cgpa'));
        }
    
        return DataTables::of($query)
            ->addIndexColumn() // This adds the S.No column
            ->make(true);
    }
}
