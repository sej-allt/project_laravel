<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\FilterController;

use App\Http\Controllers\EmailController;
use App\Http\Controllers\UpdateUserDataController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ShopController;


Route::get('/progress', 'ProgressController@getProgress')->name('progress');

//home page 
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Route::get('/',[FrontController::class, 'index'])->name('front.home');
//Route::get('/shop',[ShopController::class, 'index'])->name('front.shop');
//Route::get('/admin',[AdminController::class, 'index'])->name('front.shop');

//Route::post('/store',[BlogController::class,'store']);
Route::post('/store',[AdminController::class,'store']);


Route::post('/individualReg', [AdminController::class, 'IndividualRegistration'])->name('individualReg');
Route::get('/individualReg', [AdminController::class, 'IndividualReg'])->name('individualReg');
Route::post('/upload-csv', [AdminController::class, 'uploadCSV']);

Route::group(['middleware' => 'admin'], function () {
    //Route::get('/Admin_home', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin', [AdminController::class, 'bulk'])->name('bulk');
    Route::get('/admin',[AdminController::class, 'index'])->name('admin');
});

// Route::get('/admin', [AdminController::class, 'index'])->name('admin');
// routes/web.php

Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');

//Route::get(url: '/', action: [FilterController::class,'index']);

Route::get('/', [FilterController::class, 'index']);


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

Route::get('/email/create', [EmailContentController::class, 'create'])->name('email.create');
Route::post('/email/store', [EmailContentController::class, 'store'])->name('email.store');



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


Route::get('updateMarks', [UpdateUserDataController::class, 'showUpdateMarksForm'])->name('updateMarks');
Route::post('updateMarks', [UpdateUserDataController::class, 'updateMarks'])->name('updateMarks');


//Route::get('reqAdmin', [AdminRequestController::class, 'show'])->name('reqAdminShow');
Route::post('reqAdmin', [AdminRequestController::class, 'updatereqtable'])->name('reqAdmin');



Route::get('/viewRequests', function () {
    return view('viewRequests');
})->name('viewRequests');

Route::get('/viewRequests', [AdminRequestController::class, 'index'])->name('viewRequests');