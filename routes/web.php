<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAccountController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', [HomeController::class,'redirect']);

Route::group([
    'middleware' => ['auth','admin']
],function(){
    Route::get('/add_doctor_view', [AdminController::class,'addview']);
    Route::post('/register_doctor', [AdminController::class,'register_doctor']);
    Route::get('/show_appointment', [AdminController::class,'show_appointment']);
    Route::get('/approved_appointment/{id}', [AdminController::class,'approved_appointment']);
    Route::get('/cancel/{id}', [AdminController::class,'cancel_appointment']);
    Route::get('/show_doctors', [AdminController::class,'show_doctors']);
    Route::get('/remove_doctor/{id}', [AdminController::class,'remove_doctor']);
    Route::get('/updatedoctor/{id}', [AdminController::class,'updatedoctor']);
    Route::post('/update_doctor/{id}', [AdminController::class,'update_doctor']);
    Route::get('/logoutaccount', [AdminController::class,'logoutaccount']);


    Route::get('/account_setting', [AdminController::class,'account_setting']);
    Route::post('/update_account', [AdminController::class,'update_account']);
    Route::get('/change_password_view', [AdminController::class,'change_password_view']);
    Route::post('/change_password', [AdminController::class,'change_password']);
});

Route::group([
    'middleware' => ['auth','user']
],function(){
    Route::post('/appointment', [AppointmentController::class,'add_appointment']);
    Route::get('/my_appintment', [AppointmentController::class,'my_appintment']);
    Route::get('/cancel_appointment/{id}', [AppointmentController::class,'cancel_appointment']);
    Route::get('/updateappointment/{id}', [AppointmentController::class,'updateappointment']);
    Route::post('/update_appointment/{id}', [AppointmentController::class,'update_appointment']);
    
    
    Route::get('/edit_account', [UserAccountController::class,'edit_account_view']);
    Route::get('/edit_password', [UserAccountController::class,'edit_password_view']);
});

Route::get('/', [HomeController::class,'index']);
Route::get('/error', [ErrorController::class,'index']);
