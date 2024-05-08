<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::post('/upload-csv', [AdminController::class, 'uploadCSV']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

});



// Route::get('/admin', function () {
//     return view("Admin");
// })->name('admin');

// Route::get('/emailCSV',[MailController::class,'sendMailsToNewRegistrations']);

// Route::get('/login', [AuthController::class, 'login']);




require __DIR__ . '/auth.php';
