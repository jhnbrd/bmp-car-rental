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

    public function editCarDetails(int $car_id, Request $request): RedirectResponse|View
    {
        $car = Car::findOrFail($car_id);

        $car->update(['odometer' => $request->odometer, 'status' => $request->status]);
        
        return redirect()->route('cars-modification')->with('success', 'Car update successfully.');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'car_model_id' => 'required|exists:car_models,id',
            'odometer' => 'required|numeric|min:0',
            'license_plate' => 'required|string|unique:cars,license_plate',
            'registration_number' => 'required|string|unique:cars,registration_number',
            'registration_date' => 'required|date',
        ]);

        Car::create([
            'car_model_id' => $request->car_model_id,
            'odometer' => $request->odometer,
            'license_plate' => $request->license_plate,
            'registration_number' => $request->registration_number,
            'registration_date' => $request->registration_date,
            'status' => 'Available',
        ]);

        return redirect()->route('cars-modification')->with('success', 'Car added successfully.');
    }

    public function storeCarModel(Request $request): RedirectResponse
    {
        $request->validate([
            'model_brand' => 'required|string',
            'model_name' => 'required|string',
            'model_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'model_color' => 'required|string',
            'model_description' => 'required|string',
            'model_engine_type' => 'required|string',
            'model_car_type' => 'required|string',
            'model_engine_displacement' => 'required|string',
            'model_fuel_type' => 'required|string',
            'model_seat_capacity' => 'required|integer|min:1|max:10',
            'model_transmission' => 'required|string',
            'model_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('model_image')) {
            $image = $request->file('model_image');
            $imagePath = $image->store('car-models', 'public');
        }

        CarModel::create([
            'brand' => $request->model_brand,
            'model_name' => $request->model_name,
            'model_year' => $request->model_year,
            'color' => $request->model_color,
            'description' => $request->model_description,
            'engine_type' => $request->model_engine_type,
            'car_type' => $request->model_car_type,
            'engine_displacement' => $request->model_engine_displacement,
            'fuel_type' => $request->model_fuel_type,
            'seat_capacity' => $request->model_seat_capacity,
            'transmission' => $request->model_transmission,
            'img_file_path' => $imagePath ? 'storage/' . $imagePath : null
        ]);

        return redirect()->route('cars-modification')->with('success', 'Car model added successfully.');
    }
}