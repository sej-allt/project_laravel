<?php
namespace App\Services;

use Illuminate\Support\Facades\Validator;

class StudentCsvValidator
{
    public function validatingLocalCsvEmptyFields()
    {
        // using locally hosted csf file for validation
        $file=fopen(storage_path("app\public\csv-files\csvFile.csv"),'r');
        // $file = fopen($filePath, 'r');  // opening in read mode
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
}