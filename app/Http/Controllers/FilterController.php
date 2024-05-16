<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
{
    $courses = Course::all(); // Assuming Course is your model
    return view('studentList', ['courses' => $courses]);
}

    public function list(){
        return view('list');
    }
}
