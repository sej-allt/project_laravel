<?php
namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\LazyCollection;

use Illuminate\support\Facades\DB;

class StudentCsvValidator
{
    public function validatingLocalCsvEmptyFields()
    {
        // using locally hosted csf file for validation
        $file = fopen(storage_path("app\public\csv-files\csvFile.csv"), 'r');  // opening in read mode
        // errors array to store error messages.
        $errors = [];

        // Skip the header row
        fgetcsv($file);

        // Iterate through entire csv file row-wise
        $rowNumber = 2; // Start from 2 because of the header row
        while (($row = fgetcsv($file)) !== false) {
            // creating validator object using Validator Facade
            // checks if required fields are empty or not
            // also checks that email adress is  valid email adress or not.
            $validator = Validator::make([
                'Student ID' => $row[0],
                'E-mail' => $row[1],
                'Student Name' => $row[2],
                'Phone Number' => $row[4],
                'Campus' => $row[5],
            ], [
                'Student ID' => 'required',
                'E-mail' => 'required|email',
                'Student Name' => 'required',
                'Phone Number' => 'required',
                'Campus' => 'required',
            ]);

            if ($validator->fails()) {
                $errors[] = "Row $rowNumber: " . $validator->errors()->first();
            }

            $rowNumber++;   // incrementing rowNumber by 1
        }

        fclose($file);

        if (!empty($errors)) {
            return $errors;
        }

        return 'NO EMPTY FIELDS';
    }

    // this function checks locally hosted csv files for duplicacy of student id and email
    // return type => array of errors or string 'NO LOCAL DUPLICACY FOUND'
    public function validatingLocalCsvDuplicateFields()
    {

        // using locally hosted csf file for validation
        $file = fopen(storage_path("app\public\csv-files\csvFile.csv"), 'r');  // opening in read mode
        // errors array to store error messages.
        $errors = [];
        $student_Id_Map = [];  //to store studentid
        $email_Id_Map = [];    //to store email ids

        // Skip the header row
        fgetcsv($file);

        $rowNumber = 2;   //row 1 is header
        while (($row = fgetcsv($file)) != false) {
            // step1 extraction op :)
            $currentStudentId = $row[0];
            $currentEmailId = $row[1];

            // step2 checking for previous existence

            // Check for duplicate student ID
            if (isset($student_Id_Map[$currentStudentId])) {
                $errors[] = "Row Numbers {$student_Id_Map[$currentStudentId]} and $rowNumber Have same Student Ids:- $currentStudentId. (STUDENT ID MUST BE UNIQUE FOR EACH STUDENT";
            } else {
                // means no duplicate found for current student id
                $student_Id_Map[$currentStudentId] = $rowNumber;
            }
            // Check for duplicate email ids
            if (isset($email_Id_Map[$currentEmailId])) {
                $errors[] = "Row Numbers {$email_Id_Map[$currentEmailId]} and $rowNumber Have same Email ids:- $currentEmailId. (EMAIL IDS MUST BE UNIQUE FOR EACH STUDENT";
            } else {
                // means no duplicate found for current student id
                $email_Id_Map[$currentEmailId] = $rowNumber;
            }
            $rowNumber++;
        }
        fclose($file);

        if (!empty($errors)) {
            return $errors;
        }
        return 'NO DUPLICATE FIELDS IN LOCAL CSV FILE';
    }

    public function duplicateFilevsDb()
    {
        $errors = [];
        $rownumber = 2;



        DB::disableQueryLog();
        LazyCollection::make(function () use (&$rownumber, &$errors) {
            //accessing file in chunks taking one row at a time through yeild 


            $filecontent = fopen(storage_path('app\public\csv-files\csvFile.csv'), 'r');
            while (($line = fgetcsv($filecontent, 4500)) != false) {

                $datastring = implode(',', $line);
                $row = explode(',', $datastring);

                //like return

                yield $row;



            }

            fclose($filecontent);
        })->skip(1)
            ->chunk(1)
            ->each(function (LazyCollection $chunk) use (&$rownumber, &$errors) {

                $error = $chunk->map(function ($row) use (&$rownumber, &$errors) {
                    // we have $row for each chunkrow
                    $student_id = $row[0];
                    // echo $student_id;
                    $email = $row[1];
                    // echo $email . '<br>';
                    $duplicate = DB::table('students')->where('student_id', '=', $student_id)->where('email', '=', $email)->exists();
                    // dd($duplicate);
                    if ($duplicate) {
                        return ['Student with ID ' . $student_id . 'and email ' . $email . 'on row ' . $rownumber . ' already exists in University records'];
                    }
                    $duplicate = DB::table('students')->where('student_id', '=', $student_id)->exists();
                    if ($duplicate) {
                        return ['Student with ID ' . $student_id . 'on row ' . $rownumber . ' already exists in University records'];
                    }
                    $duplicate = DB::table('students')->where('email', '=', $email)->exists();
                    if ($duplicate) {
                        return ['Student with  email ' . $email . 'on row ' . $rownumber . ' already exists in University records'];
                    }

                })->flatten()->toArray();

                $rownumber++;

                // echo $error;
                // dd($error);
                $eror = implode(',', $error);
                // echo $eror;
                if ($eror)
                    $errors[] = $eror;
                // dd($errors);
            });
        // dd($errors);
        if ($errors) {
            // dd($errors);
            return $errors;
        } else
            return 'all good continue seeding';

    }
}