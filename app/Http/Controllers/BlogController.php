<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\student;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;


class BlogController extends Controller
{
    public function index()
    {
        return view('fileUpload');
    }
    public function store(Request $request){
        $title="Bulk Upload";

        $filename= time().'.'.request()->file->getClientOriginalExtension();

        $request->file->move(public_path('blogs'), $filename);

        $blog= new student;
        $blog->title= $title;
        $blog->file =$filename;
        //$progress= ...;//fetch progress
        $blog->save();

        return response()->json(['succsess'=>'File uploaded successfully']);

    }
}
