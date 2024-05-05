<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('admin');

Route::post('/upload-csv', [AdminController::class, 'uploadCSV']);

Route::group(['middleware'=> 'admin'], function(){

});
