<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

use App\Services\StudentCsvValidator;
use Illuminate\Support\Facades\Log;

use App\Models\EmailContent;

class AdminController extends Controller
{
    protected $errorOccured;
    public function index()
    {
         $criterias = DB::table('criterias')->select('event_id')->get();

        return view('Admin_home', compact('criterias'));
        //return view('Admin_home');
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
        // Validate the incoming request data
        $request->validate([
            'student_id' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'phn_no' => 'required',
            'campus' => 'required',
            'marks10' => 'required',
            'marks12' => 'required',
        ]);

        // try {
        // Create CSV file and get the filename
        $csvFilename = $this->createCSVFile($request);
        $this->doValidation1();
        if (is_array($this->errorOccured))
            return redirect()->route('individualReg')->with('errors', $this->errorOccured);
        else
            return redirect()->route('individualReg')->with('status', 'success');
    }

    private function createCSVFile(Request $request)
    {
        // Form the header row for CSV
        $header = [
            'student_id',
            'email',
            'student_name',
            'program_id',
            'semester',
            'father_name',
            'phone_number',
            'campus',
            'type',
            'address',
            'T1',
            'T2'
        ];
        for ($i = 2; $i <= 12; $i++) {
            $header[] = 'T' . $i;
        }
        $header[] = 'cgpa';
        // Form the data row for CSV
        $data = [
            $request->student_id,
            $request->email,
            $request->name,
            $request->program_id,
            $request->semester,
            $request->father_name, // Assuming father_name might be optional
            $request->phn_no,
            $request->campus,
            $request->type, // Assuming type might be optional
            $request->address, // Assuming address might be optional
            $request->T1,
            $request->T2,
        ];
        for ($i = 2; $i <= 12; $i++) {
            $semesterGradeKey = 'T' . $i;
            $data[] = $request->has($semesterGradeKey) ? $request->$semesterGradeKey : '';
        }

        //cgpa needed. will look into it.

        // Combine header and data rows
        $rows = [$header, $data];

        // Serialize each row into CSV-compatible strings
        $csvRows = array_map(function ($row) {
            return implode(',', $row);
        }, $rows);

        // Combine rows with end of line character
        $csvData = implode(PHP_EOL, $csvRows);

        // Generate a unique filename
        $filename = 'csvFile.csv'; // You can use a dynamic filename if needed

        // Create the CSV file
        $filePath = storage_path('app/public/csv-files/' . $filename);
        file_put_contents($filePath, $csvData);

        // Return the file path
        return $filePath;
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
        // try {
        $path = $file->storeAs('csv-files', $filename, 'public');
        //check validation

        $this->doValidation1();
        if (is_array($this->errorOccured))
            return redirect()->route('bulk')->with('errors', $this->errorOccured);
        else
            return redirect()->route('bulk')->with('status', 'success');
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


        // Mail::to($student_email)->send(new RegistrationConfirmation($student_name, $student_id));

        $emailContent = EmailContent::where('type', 'welcome')->first();
        Mail::to($student_email)->send(new RegistrationConfirmation($student_name, $student_id, $emailContent));
    }

    // this function will read uploaded csv file and then send registration successful message to newly registered students at their gmail
    // this will read 3 columns from csv file that is
    // student name, student ID, gmail ID, password
    public function sendMailsToNewRegistrations()
    {
        $file = fopen(storage_path("app\public\csv-files\csvFile.csv"), 'r');

        // skipping head row( which contains column names)
        fgetcsv($file);

        // Read each row and extract the email
        while (($row = fgetcsv($file)) !== false) {
            // adding data to email_ids
            $std_Mail_id = $row[1];
            $std_name = $row[2];
            $std_uid = $row[0];
            $this->generateAndSendMail($std_uid, $std_name, $std_Mail_id);
        }
        fclose($file);  //closing file handler

    }

    //validation

    public function doValidation1()
    {
        $validator = new StudentCsvValidator();
        $response = $validator->validatingLocalCsvEmptyFields();
        $this->errorOccured = $response;
        if (is_array($response)) {

            foreach ($response as $error) {
                echo $error . "<br>";
            }
        } else {

            $this->doValidation2();
            // echo $response;
        }
    }
    public function doValidation2()
    {
        $validator = new StudentCsvValidator();
        $response = $validator->validatingLocalCsvDuplicateFields();
        $this->errorOccured = $response;
        if (is_array($response)) {

            foreach ($response as $error) {
                echo $error . "<br>";
            }
        } else {
            //something for gol gol loading
            $this->databaseDuplicacy();
            // echo $response;
        }
    }

    public function databaseDuplicacy()
    {
        $duplicacy = new StudentCsvValidator();
        $responses = $duplicacy->duplicateFilevsDb();
        // dd($responses);
        $this->errorOccured = $responses;
        if (is_array($responses)) {

            foreach ($responses as $error) {
                echo $error . '<br>';
            }
            // return redirect()->route('admin')->with('status', 'error');

        } else {
            //progress bar ig inside seeder

            Artisan::call('db:seed', [
                '--class' => 'studentseeder',
                '--force' => true,
            ]);
            $this->sendMailsToNewRegistrations();
            // try {
            //     Artisan::call('db:seed', [
            //         '--class' => 'studentseeder',
            //         '--force' => true,
            //     ]);
            //     $this->sendMailsToNewRegistrations();
            //     return redirect()->route('admin')->with('status', 'success');
            // } catch (\Exception $e) {
            //     // An error occurred during file storage or seeding
            //     return redirect()->route('admin')->with('status', 'error');
            // }
            // echo $responses;
        }

    }
}
