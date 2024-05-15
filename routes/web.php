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

Route::get('/progress', 'ProgressController@getProgress')->name('progress');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/file-upload',[BlogController::class,'index']);
// Route::post('/store',[BlogController::class,'store']);
//Route::get('/admin',[BlogController::class,'index']);
Route::post('/store',[BlogController::class,'store']);



Route::post('/upload-csv', [AdminController::class, 'uploadCSV']);

Route::group(['middleware' => 'admin'], function () {
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/store',[AdminController::class,'store']);

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



// Route::get('/validateEmpty-csv', [UploadValidatorController::class, 'doValidation1'])->name('validate.csv');
// Route::get('/validateLocalDuplicate-csv', [UploadValidatorController::class, 'doValidation2']);
// Route::get('/databasedup', [UploadValidatorController::class, 'databaseDuplicacy']);

Route::get('/email/create', [EmailContentController::class, 'create'])->name('email.create');
Route::post('/email/store', [EmailContentController::class, 'store'])->name('email.store');

