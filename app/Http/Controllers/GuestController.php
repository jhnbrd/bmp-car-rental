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
}
