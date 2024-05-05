<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin');
    }
    public function uploadCSV(Request $request)
    {
        // Validate the request to ensure a file is uploaded
        $request->validate([
            'csvFile' => 'required|mimes:csv,txt', // Accept only CSV files
        ]);

        // Retrieve the uploaded file
        $file = $request->file('csvFile');

        // Define the storage path and filename
        // You can specify the storage disk and folder as per your needs
        $storagePath = 'storage/app/public/csv-files';
        $filename = 'csvFile.csv'; // Use the original file name or specify a new name

        // Save the file to the storage folder
        $path = $file->storeAs('csv-files', $filename, 'public');

        // You can also use 'local' as the disk, but 'public' allows the file to be accessible via the web

        //as the file is uploaded. seed it to database

        Artisan::call('db:seed', [
            '--class' => 'studentseeder',
            '--force' => true,
        ]);


        //delete csv
        // Storage::delete('csv-files/csvFile.csv');

        // Return a response indicating success or redirect


        // return response()->json(['message' => 'File uploaded successfully!', 'path' => $path]);
        return redirect()->route('admin');
        // return redirect()->route('admin')->with('status', 'Data uploaded successfully!');
    }

    //deletecsv

    public function deletecsv()
    {
        Storage::delete('csv-files/csvFile.csv');
    }

}
