<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\RegistrationConfirmation;

class MailController extends Controller
{
    public function generateAndSendMail($student_id, $student_name, $student_email)
    {
        // Generate the email message and call Mailable Class
        $message = "CONGRATULATIONS $student_name:\n\n"
            . "You have been successfully registered to GRAPHIC ERA ERP PORTAL.\n\n"
            . "Your STUDENT ID is: $student_id\n\n"
            . "TO LOGIN:\n"
            . "1) GO TO https://erp.geu.ac.in\n"
            . "2) YOUR STUDENT ID IS YOUR USERNAME.\n"
            . "3) CLICK ON FORGOT PASSWORD TO RESET AND SAVE YOUR NEW PASSWORD.\n\n"
            . "WELCOME ABOARD.";

        // Send the email
        Mail::to($student_email)->send(new \App\Mail\RegistrationConfirmation($message));
    }

    // this function will read uploaded csv file and then send registration successful message to newly registered students at their gmail
    // this will read 3 columns from csv file that is
    // student name, student ID, gmail ID, password
    public function sendMailsToNewRegistrations()
    {
        $file=fopen(storage_path("app\public\csvFile.csv"),'r');

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
