<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParkingController;
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
    return view('auth/login');
});

//Authorization
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('logins');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//Home
Route::get('dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

Route::get('parking', [ParkingController::class, 'showParking'])->name('parking');
Route::get('available', [ParkingController::class, 'AvailableSlot'])->name('available');
Route::post('payment', [ParkingController::class, 'paymentPage'])->name('payment');
Route::get('updateStatus', [ParkingController::class, 'updateStatus'])->name('updateStatus');
Route::get('failedPay', [ParkingController::class, 'failedPay'])->name('failedPay');
Route::get('cancel/{id}', [ParkingController::class, 'cancelReservation'])->name('cancel');







