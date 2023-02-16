<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerficationController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('students', 'cms.students.create');

Route::prefix('cms/admin')->middleware('guest:admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::prefix('cms/admin')->middleware('auth:admin', 'verified')->group(function () {
    Route::view('', 'cms.parent')->name('cms.parent');
    Route::resource('admins', AdminController::class);
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout')->withoutMiddleware('verified');
});

Route::prefix('cms/admin')->group(function () {
    Route::view('studentid', 'cms.students.studentid');
    Route::view('showresponse', 'cms.students.showresponse');
    Route::resource('complaints', ComplaintController::class);
});

Route::middleware('guest')->group(function(){
    Route::get('/forgot-password', [ResetPasswordController::class, 'requestPasswordRest'])->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
});

Route::prefix('email')->middleware('auth:admin')->group(function () {
    Route::get('verify', [EmailVerficationController::class, 'notice'])->name('verification.notice');
    Route::get('verification/send', [EmailVerficationController::class, 'send'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('verify/{id}/{hash}', [EmailVerficationController::class, 'verify'])->name('verification.verify');
});


