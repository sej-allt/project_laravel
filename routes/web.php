<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UpdateUserDataController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::post('/upload-csv', [AdminController::class, 'uploadCSV']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

});
// Route::get('/admin', [AdminController::class, 'index'])->name('admin');
// routes/web.php
Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');

//  Route::get('/forgot',[AuthController::class,'forgot_password'])->name('forgot');

Route::post('/password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');

// Route::get('/emailCSV',[MailController::class,'sendMailsToNewRegistrations']);

// Route::get('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);
require __DIR__ . '/auth.php';

// Route::get('reset-password', [ResetPasswordController::class, 'showResetForm'])->name('reset-password');
// Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('reset-password');


Route::get('reset-password/{stu_id}/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset-password');
Route::post('reset-password/{stu_id}/{token}', [ResetPasswordController::class, 'reset'])->name('reset-password');

Route::post('password/update', [ResetPasswordController::class, 'update'])->name('password.update');

// Route::get('updateName/{student_id}/{student_name}/{password}', [UpdateUserDataController::class, 'showUpdateForm'])->name('updateName');


// Route::post('updateName/{student_id}/{student_name}/{password}', [UpdateUserDataController::class, 'update'])->name('updateName');


// Show update form
Route::get('updateName', [UpdateUserDataController::class, 'showUpdateForm'])->name('updateName');
Route::post('updateName', [UpdateUserDataController::class, 'updateName'])->name('updateUserDataName');

Route::get('updateEmail', [UpdateUserDataController::class, 'showUpdateEmailForm'])->name('updateEmail');
Route::post('updateEmail', [UpdateUserDataController::class, 'updateEmail'])->name('updateUserDataEmail');

Route::get('updatePhone', [UpdateUserDataController::class, 'showUpdatePhoneForm'])->name('updatePhone');
Route::post('updatePhone', [UpdateUserDataController::class, 'updatePhone'])->name('updateUserDataPhone');

Route::get('updateFatherName', [UpdateUserDataController::class, 'showUpdateFNameForm'])->name('updateFatherName');
Route::post('updateFatherName', [UpdateUserDataController::class, 'updateFName'])->name('updateUserDataFName');

Route::get('updateAddress', [UpdateUserDataController::class, 'showUpdateAdrForm'])->name('updateAddress');
Route::post('updateAddress', [UpdateUserDataController::class, 'updateAddress'])->name('updateUserDataAddress');