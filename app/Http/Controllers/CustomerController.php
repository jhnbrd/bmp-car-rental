<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CustomerController extends Controller
{
    public function home(): View
    {
        return view('customer.home');
    }

    public function cars(): View
    {
        return view('cars');
    }

    public function booking(): View
    {
        return view('booking');
    }

    public function contacts(): View
    {
        return view('guest.contacts');
    }
}
