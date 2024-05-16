<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Import the Item model

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function filterItems(Request $request)
    {
        // Retrieve filter parameters from request
        $course = $request->input('course');
        $marks10 = $request->input('marks10');
        $marks12 = $request->input('marks12');
        $cgpa = $request->input('cgpa');

        // Filtering logic based on request parameters
        $filteredItems = Item::where('course', $course)
                                ->where('marks10', '<=', $marks10)
                                ->where('marks12', '<=', $marks12)
                                ->where('cgpa', '<=', $cgpa)
                                ->get();

        return view('items.index', compact('filteredItems'));
    }
}
