<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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
    
    public function IndividualReg()
    {
        return view('individualReg');
    }

    public function IndividualRegistration(Request $request)
    {
        $request->validate(
            [
                'student_id'=>'required',
                'email'=>'required|email',
                'name'=>'required',
                'phn_no'=>'required',
                'campus'=>'required',
                'marks10'=>'required',
                'marks12'=>'required',
            ]
        );

        // // Convert form data to CSV format
        // $csvData = implode(',', [
        //     $request->student_id,
        //     $request->email,
        //     $request->name,
        //     $request->father_name,
        //     $request->phone_number,
        //     $request->campus,
        //     $request->type,
        //     $request->address,
        //     $request->makrs10,
        //     $request->marks12,
        // ]);

        // // Save CSV data to a temporary file
        // $temporary = 'temp_' . uniqid() . '.csv';
        // Storage::put($temporary, $csvData);

        // try {
        //     // Run the seeder with the CSV file
        //     Artisan::call('db:seed', [
        //         '--class' => 'studentseeder',
        //         '--file' => $temporary,
        //         '--force' => true,
        //     ]);

        //     // Optionally, perform any additional actions
        //     $this->sendMailsToNewRegistrations();

        //     // Redirect back to the form with a success message
        //     return redirect()->back()->with('status', 'success');
        // } catch (\Exception $e) {
        //     // An error occurred during seeding or additional actions
        //     // Log the error or handle it appropriately
        //     return redirect()->back()->with('status', 'error');
        // } finally {
        //     // Delete the temporary CSV file
        //     Storage::delete($temporary);
        // }

        echo"<pre>";
        print_r($request->all());
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
