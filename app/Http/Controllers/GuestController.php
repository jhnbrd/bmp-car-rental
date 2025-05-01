<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GuestController extends Controller
{
    public function cars(): View
    {
        return view('cars');
    }

    public function booking(): View
    {
        return view('booking');
    }

    public function payment(): View
    {
        return view('payment');
    }
    public function terms_condition(): View
    {
        return view('terms_condition');
    }

}
