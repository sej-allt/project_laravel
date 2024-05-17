<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class qrcontrol extends Controller
{
    public function generateqr(string $event_id)
    {
        // dd(session('student_id'));
        // dd($event_id);
        session(['event_id' => $event_id]);
        return redirect()->route('qrcode');

    }
}
