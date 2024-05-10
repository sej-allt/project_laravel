<?php

namespace App\Http\Controllers;

use App\Services\StudentCsvValidator;
use Illuminate\Http\Request;

class UploadValidatorController extends Controller
{
    public function doValidation1()
    {
        $validator=new StudentCsvValidator();
        $response=$validator->validatingLocalCsvEmptyFields();
        if(is_array($response)){
            foreach ($response as $error){
                echo $error . "<br>";
            }
        }
        else{
            echo $response;
        }
    }
    public function doValidation2(){
        $validator=new StudentCsvValidator();
        $response=$validator->validatingLocalCsvDuplicateFields();
        if(is_array($response)){
            foreach ($response as $error){
                echo $error . "<br>";
            }
        }
        else{
            echo $response;
        }
    }
}
