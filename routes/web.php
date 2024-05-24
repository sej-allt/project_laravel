<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UpdateUserDataController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StudentController;

// Including admin routes
require __DIR__ . '/adminroutes.php';

// Default welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Individual registration routes
Route::match(['get', 'post'], '/individualReg', [AdminController::class, 'IndividualRegistration'])->name('individualReg');
Route::post('/upload-csv', [AdminController::class, 'uploadCSV']);

// Admin routes group with middleware protection
Route::group(['middleware' => 'admin'], function () {
    Route::get('/Admin_home', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin', [AdminController::class, 'bulk'])->name('bulk');
    Route::get('/email/create', [EmailContentController::class, 'create'])->name('email.create');
    Route::post('/email/store', [EmailContentController::class, 'store'])->name('email.store');
});

// Auth routes
Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset password routes
Route::get('reset-password/{stu_id}/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset-password');
Route::post('reset-password/{stu_id}/{token}', [ResetPasswordController::class, 'reset'])->name('reset-password');
Route::post('password/update', [ResetPasswordController::class, 'update'])->name('password.update');

// Profile and user data update routes
Route::get('profile', function () {
    return view('profile');
})->name('profile');

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

// Admin request route
Route::post('reqAdmin', [AdminRequestController::class, 'updatereqtable'])->name('reqAdmin');

// View requests route
Route::get('/viewRequests', [AdminRequestController::class, 'index'])->name('viewRequests');

// Email content routes
Route::get('/get-email-content', [EmailContentController::class, 'getEmailContent'])->name('email.get-content');

// Event routes
Route::get('/eventForm', [EventController::class, 'event'])->name('create_event');
Route::post('/eventForm', [EventController::class, 'storeEvent'])->name('create_event');

// Student routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/export', [StudentController::class, 'export'])->name('students.export');
Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');

// Include auth routes
require __DIR__ . '/auth.php';
