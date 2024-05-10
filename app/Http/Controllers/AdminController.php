<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin_home');
    }


    public function bulk()
    {
        return view('admin');
    }


    public function IndividualRegistration(Request $request)
    {
        return redirect()->route('admin');
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
            $this->sendMailsToNewRegistrations();
            return redirect()->route('admin')->with('status', 'success');
        } catch (\Exception $e) {
            // An error occurred during file storage or seeding
            return redirect()->route('admin')->with('status', 'error');
        }
        return redirect()->route('admin');
    }

    //deletecsv

    public function deletecsv()
    {
        Storage::delete('csv-files/csvFile.csv');
    }

    public function generateAndSendMail($student_id, $student_name, $student_email)
    {
        // Generate the email message and call Mailable Class
        // Send the email
        Mail::to($student_email)->send(new RegistrationConfirmation($student_name,$student_id));
    }

    // this function will read uploaded csv file and then send registration successful message to newly registered students at their gmail
    // this will read 3 columns from csv file that is
    // student name, student ID, gmail ID, password
    public function sendMailsToNewRegistrations()
    {
        $file=fopen(storage_path("app\public\csv-files\csvFile.csv"),'r');

        // skipping head row( which contains column names)
        fgetcsv($file);

        // Read each row and extract the email
        while (($row = fgetcsv($file)) !== false) {
            // adding data to email_ids
            $std_Mail_id = $row[1];
            $std_name= $row[2];
            $std_uid= $row[0];
            $this->generateAndSendMail($std_uid, $std_name, $std_Mail_id);
        }
        fclose($file);  //closing file handler        
    }
}
