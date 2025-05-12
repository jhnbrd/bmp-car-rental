<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Landing Routes
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'Customer') {
            return view('customer.home');
        } elseif ($user->role === 'Employee') {
            return redirect()->route('employee.dashboard');
        }
    }
    return view('guest.home');
})->name('home');

// Guest Routes (Handles redirection based on login role)
Route::get('/cars', [CarController::class, 'showCars'])->name('cars');
Route::get('/contacts', [CustomerController::class, 'contacts'])->name('contacts');
Route::get('/payment', function() {
    return view('payment');
})->name('contacts');

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Customer Specific Routes
    Route::middleware('checkRole:Customer')->group(function () {
        Route::get('/booking', [BookingController::class, 'showUserBookings'])->name('booking');
        Route::get('/booking/{car_model}', [BookingController::class, 'addBookingDetails'])->name('add_booking_details');
        Route::post('/booking/process/', [BookingController::class, 'processAddBooking'])->name('process_add_booking');
        Route::post('/booking/cancel/{booking}', [BookingController::class, 'cancelBookingUser'])->name('cancel_booking');
    });

    // Employee Specific Routes
    Route::middleware('checkRole:Employee')->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

        // Customer Management Routes
        Route::get('/customers', [EmployeeController::class, 'customer_records'])->name('customer-records');
        
        // Booking Management Routes
        Route::get('/bookings/manage', [EmployeeController::class, 'booking_management'])->name('booking-management');
        Route::get('/bookings/history', [EmployeeController::class, 'booking_history'])->name('booking-history');
        Route::get('/bookings/unsettled', [EmployeeController::class, 'booking_unsettled'])->name('booking-unsettled');

        // Car Management Routes
        Route::get('/cars/manage', [EmployeeController::class, 'car_modification'])->name('cars-modification');

        // Employee Management Routes
        Route::get('/employees', [EmployeeController::class, 'employee_records'])->name('employee-records');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('add-employee');
        Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('update-employee');
    });
    
});

// Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('update-password');
    Route::put('/profile/picture', [ProfileController::class, 'updatePicture'])->name('update-profile-picture');
});

require __DIR__.'/auth.php';