<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class qrcontrol extends Controller
{
    public function generateqr(/*string $event_id*/)
    {
        // dd(session('student_id'));
        return view('qrcode.generateqr')->with('event_id', '1232');

    }
}
