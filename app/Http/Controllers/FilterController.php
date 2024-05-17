<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\marks;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
{
    $courses = Course::all(); // Assuming Course is your model
    $data['course']= $course;
    $data['marks']= $marks;
        //$data['products']= $products;

    return view('studentList', ['courses' => $courses], ['marks'=> $marks]);

}

    public function list(){
        return view('list');
    }
}



// {
//     public function index()
//     {   
//         $categories =Category::orderBy('name', 'ASC')->with('sub_category')->where('status',1)->get();
//         $brands= Brand::orderBy('name', 'ASC')->where('status', 1)->get();//these are the filter names
//         $products =Product::orderBy('id', 'DESC')->where('status',1)->get();
        
//         $data['categories']= $categories;
//         $data['brands']= $brands;
//         $data['products']= $products;

//         return view('front.shop', $data);
//     }
// }





