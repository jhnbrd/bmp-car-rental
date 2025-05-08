<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function addBookingDetails(int $car_model, Request $request): RedirectResponse|View
    {
        return view('payment');
    }
}
