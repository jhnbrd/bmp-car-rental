<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are automatically protected by the API middleware group.
|
*/

// Public API Routes
Route::get('/cars', [CarController::class, 'apiShowCars']);

// Protected API Routes
Route::middleware('auth:sanctum')->group(function () {
    // User Info
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Customer Routes
    Route::middleware('role:Customer')->group(function () {
        Route::get('/bookings', [BookingController::class, 'apiShowUserBookings']);
        Route::post('/bookings', [BookingController::class, 'apiProcessAddBooking']);
        Route::post('/bookings/{booking}/cancel', [BookingController::class, 'apiCancelBooking']);
    });

    // Employee Routes
    Route::middleware('role:Employee')->group(function () {
        Route::get('/customers', [EmployeeController::class, 'apiCustomerRecords']);
        Route::get('/bookings/all', [EmployeeController::class, 'apiBookingManagement']);
        Route::get('/cars/manage', [EmployeeController::class, 'apiCarModification']);
        
        // Admin Only Routes
        Route::middleware('role:Admin')->group(function () {
            Route::get('/audit-logs', [AuditLogController::class, 'apiIndex']);
            Route::get('/employees', [EmployeeController::class, 'apiEmployeeRecords']);
        });
    });
}); 