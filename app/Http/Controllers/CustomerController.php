<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function home(): View
    {
        return view('customer.home');
    }

    public function cars(): View
    {
        $cars = CarModel::all();
        return view('cars', ['carModels' => $cars]);
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
