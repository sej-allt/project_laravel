<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }
    // Export data from the database table to CSV
    public function export()
    {
        // Fetch data from the 'eligibles' table
        $data = DB::table('eligibles')->get()->toArray();

        // Create a CSV writer instance
        $csv = Writer::createFromString('');

        // Insert header
        if (!empty($data)) {
            $csv->insertOne(array_keys((array) $data[0]));
        }

        // Insert rows
        foreach ($data as $row) {
            $csv->insertOne((array) $row);
        }

        $filename = 'eligibles.csv';
        Storage::put($filename, $csv->toString());

        return response()->download(storage_path("app/$filename"));
    }

    // Import CSV data into the database table
    public function import(Request $request)
    {
        // Your import logic here
    }
}
