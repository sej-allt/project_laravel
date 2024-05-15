<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/students', function () {
    return view('adminside.liststudents');
})->name('list');
