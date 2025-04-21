<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Landing Route (Handles redirection based on login role)
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

// Guest Routes (users not logged in)
Route::middleware('guest')->group(function() {
    Route::get('/cars', [GuestController::class, 'cars'])->name('cars');
    Route::get('/booking', [GuestController::class, 'booking'])->name('booking');
    Route::get('/contacts', [GuestController::class, 'contacts'])->name('contacts');
});

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Customer Specific Routes
    Route::middleware('checkRole:Customer')->group(function () {
        Route::get('/cars', [CustomerController::class, 'cars'])->name('cars');
        Route::get('/booking', [CustomerController::class, 'booking'])->name('booking');
        Route::get('/contacts', [CustomerController::class, 'contacts'])->name('contacts');
    });

    // Employee Specific Routes
    Route::middleware('checkRole:Employee')->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
        Route::get('/customers', [EmployeeController::class, 'customer_records'])->name('customer-records');
        Route::get('/employees', [EmployeeController::class, 'employee_records'])->name('employee-records');
        Route::get('/bookings', [EmployeeController::class, 'booking_management'])->name('booking-management');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('add-employee');
    });

});

require __DIR__.'/auth.php';