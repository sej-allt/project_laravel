<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class QRController extends Controller
{
    public function index()
    {
        return view('scanner');
    }
    public function scan(Request $request)
    {
        $qrData = $request->input('qr_data');
        dd($qrData);
        // Process the scanned QR code data as needed
        // For example, you can extract event ID and student ID from the QR data

        return response()->json(['message' => 'QR code scanned successfully']);
    }

}
