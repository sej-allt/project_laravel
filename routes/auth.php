<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\qrcontrol;
use App\Http\Controllers\EventController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginreq'])->name('login');

// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');





Route::group(['middleware' => 'dashboard'], function () {
    Route::get('/home', [AuthController::class, 'home'])->name('home');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});



//testing

// Route::get('/adminhead', function () {
//     return view('layout.adminheader');
// });
// Route::get('/userhead', function () {
//     return view('layout.userheader');
// });
// Route::get('/dash', function () {
//     return view('partials.dash');
// })->name('dash');
// Route::get('/other', function () {
//     return view('partials.other');
// })->name('other');

//qrtest
Route::get('/qrgen/{event_id}', [qrcontrol::class, 'generateqr'])->name('generate');
Route::get('/events', [EventController::class, 'checkeligibletable'])->name('events');

Route::get('/scan', function () {
    return view('userside.qrcode.generateqr');
})->name('qrcode');