<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Landing Routes (Handles redirection based on login role)
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

Route::get('/cars', [CustomerController::class, 'cars'])->name('cars');
Route::get('/booking', [CustomerController::class, 'booking'])->name('booking');
Route::get('/contacts', [CustomerController::class, 'contacts'])->name('contacts');

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Customer Specific Routes
    Route::middleware('checkRole:Customer')->group(function () {
        Route::get('/terms-condition/{car_model}', [CustomerController::class, 'termsCondition'])->name('terms_condition');
        Route::post('/terms-condition/process/{car_model}', [CustomerController::class, 'processTermsConditions'])->name('process_terms_condition');
        Route::get('/payment/{booking}', [CustomerController::class, 'payment'])->name('payment');
    });

    // Employee Specific Routes
    Route::middleware('checkRole:Employee')->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
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
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('update-password');
    Route::put('/profile/picture', [ProfileController::class, 'updatePicture'])->name('update-profile-picture');
});

require __DIR__.'/auth.php';