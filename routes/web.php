<?php

use App\Http\Controllers\GedungController;
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

// routes/web.php
// routes/web.php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalendarController;


Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('admin/booking/confirm/{id}', [AdminController::class, 'confirmBooking'])->name('admin.booking.confirm');
    Route::delete('/admin/delete-booking/{id}', [AdminController::class, 'deleteBooking'])->name('admin.delete.booking');
    Route::post('/admin/confirm-booking/{id}', [AdminController::class, 'confirmBooking'])->name('admin.confirm.booking');
    Route::post('admin/payment/confirm/{id}', [AdminController::class, 'confirmPayment'])->name('admin.payment.confirm');
    Route::get('/admin/calendar', [CalendarController::class, 'adminView'])->name('admin.calendar');
    Route::get('/admin/calendar/events', [CalendarController::class, 'getEvents']);
    Route::post('/admin/calendar/events', [CalendarController::class, 'addEvent']);
    Route::get('/admin/bookings', [AdminController::class, 'index'])->name('admin.bookings.index');
    Route::post('/admin/bookings/{booking}/confirm-payment', [AdminController::class, 'confirmBuktiTransfer'])->name('admin.bookings.confirmPayment');
    Route::delete('/admin/calendar/events/{id}', [AdminController::class, 'deleteEvent'])->name('admin.calendar.deleteEvent');
});


// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::post('user/book', [UserController::class, 'bookVenue'])->name('user.book');
    Route::get('/user/calendar', [CalendarController::class, 'userView'])->name('user.calendar');
    Route::get('/user/calendar', [UserController::class, 'calendar'])->name('user.calendar');
    Route::get('/user/calendar/events', [CalendarController::class, 'getEvents']);
    Route::get('/bookings/{booking}/payment', [UserController::class, 'payment'])->name('bookings.payment');
    Route::post('/bookings/{booking}/upload-bukti-transfer', [UserController::class, 'uploadBuktiTransfer'])->name('bookings.uploadBuktiTransfer');
    Route::get('/user/bookings', [UserController::class, 'bookings'])->name('user.bookings');
    Route::get('/account', [UserController::class, 'account'])->name('user.account');
});

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/gedung', [GedungController::class, 'index'])->name('gedung.index');
Route::get('/gedung/{id}', [GedungController::class, 'show'])->name('gedung.show');
