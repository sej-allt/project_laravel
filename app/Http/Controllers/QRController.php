<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eligible;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class QRController extends Controller
{
    public function index()
    {
        return view('scanner');
    }

    public function scan(Request $request)
    {
        $qrData = $request->input('qr_data');
        Log::info('Received QR data: ' . $qrData);

        if (!$qrData) {
            return response()->json(['message' => 'QR data is missing'], 400);
        }

        $data = explode(' ', $qrData);

        if (count($data) < 2) {
            return response()->json(['message' => 'Invalid QR data format'], 400);
        }

        $studentId = $data[0];
        $eventId = $data[1];

        Log::info('Extracted studentId: ' . $studentId . ' and eventId: ' . $eventId);

        // Assuming the table has columns `event_id` and `student_id`
        $eligibility = DB::table('eligibles')->where('event_id', $eventId)->where('student_id', $studentId)->update(['present'=>1]);

        if ($eligibility) {
            return response()->json(['message' => 'Attendance marked successfully']);
        } else {
            Log::info('No eligibility found for event_id: ' . $eventId . ' and student_id: ' . $studentId);
        }

        return response()->json(['message' => 'QR code scanned successfully']);
    }
}
