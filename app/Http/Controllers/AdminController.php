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
        try {
            $path = $file->storeAs('csv-files', $filename, 'public');

            // As the file is uploaded, seed it to the database
            Artisan::call('db:seed', [
                '--class' => 'studentseeder',
                '--force' => true,
            ]);

<<<<<<< HEAD
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
=======
            // File uploaded and seeded successfully
            return redirect()->route('admin')->with('status', 'success');
        } catch (\Exception $e) {
            // An error occurred during file storage or seeding
            return redirect()->route('admin')->with('status', 'error');
        }        return redirect()->route('admin');
>>>>>>> 8157ace11cc596b2a2227c2945a8c149da56f3d2
    }

    //deletecsv

    public function deletecsv()
    {
        Storage::delete('csv-files/csvFile.csv');
    }

    // this function will read uploaded csv file and then send registration successful message to newly registered students at their gmail
    // this will read 3 columns from csv file that is
    // student name, student ID, gmail ID, password
    public function sendMailsToNewRegistrations($filePath)
    {

    }
}
