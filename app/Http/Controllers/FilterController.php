<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
    {
        $students = Category::all();

        $query = Product::query();

        if ($request->filled('title')) {
            $query->where('name', $request->input('title'));
        }

        if ($request->filled('min')) {
            $query->where('price', '>=', $request->input('min'));
        }

        if ($request->filled('max')) {
            $query->where('price', '<=', $request->input('max'));
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use($request) {
                $q->whereIn('id', $request->input('category'));
            });
        }

        //$products = $query->get();
        //return view('filter', compact('products', 'categories'));
        return view('filter');
    }
}
