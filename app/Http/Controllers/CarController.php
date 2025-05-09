<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Car;
use App\Models\CarModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display the user-side cars view, ordered by availability.
     */
    public function showCars(): RedirectResponse|View
    {
        $carModels = CarModel::withCount(['cars' => function ($query) {
            $query->where('status', 'Available');
        }])
        ->orderBy('cars_count', 'desc')
        ->paginate(8);

        return view('cars', ['carModels' => $carModels]);
    }
}