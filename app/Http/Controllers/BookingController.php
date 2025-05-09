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

class BookingController extends Controller
{
    /**
     * Display the user-side bookings view.
     */
    public function showUserBookings(): RedirectResponse|View
    {
        $user = Auth::user();

        $bookings = Booking::where('customer_id', $user->customer->id)
                                ->with('car.carModel')
                                ->orderBy('created_at', 'desc')
                                ->get();
        return view('booking', compact('bookings'));
    }

    /**
     * Retrieve car details for booking and display rental agreement policy
     * and payment processing view
     * @param int $car_model
     * @param \Illuminate\Http\Request $request
     * @return mixed|RedirectResponse
     */
    public function addBookingDetails(int $car_model, Request $request): RedirectResponse|View
    {
        $pickupDate = $request->query('pickup_date');
        $returnDate = $request->query('return_date');

        if (!$pickupDate || !$returnDate) {
            return redirect()->route('cars')->with('error', 'Please select pick-up and return dates.');
        }

        $availableCar = Car::where('car_model_id', $car_model)
                            ->where('status', 'available')
                            ->first();

        if (!$availableCar) {
            return redirect()->route('cars')->with('error', 'No available units for the selected car model.');
        }

        $plateNumber = $availableCar->license_plate;

        $carModel = CarModel::findOrFail($car_model);

        $pickup = new \DateTime($pickupDate);
        $return = new \DateTime($returnDate);
        $numberOfDays = $pickup->diff($return)->days;

        $baseRate = 0;
        switch ($carModel->car_type) {
            case 'Sedan':
                $baseRate = 500;
                break;
            case 'SUV':
                $baseRate = 1000;
                break;
            case 'Pick-up':
                $baseRate = 1500;
                break;
        }

        $totalAmount = $baseRate * $numberOfDays;
        $vat = $totalAmount * 0.12;
        $rentalFee = $totalAmount - $vat;

        return view('payment', compact('pickupDate', 'returnDate', 'carModel', 'totalAmount', 'vat', 'rentalFee', 'plateNumber'));
    }

    public function processAddBooking(Request $request): RedirectResponse
    {
        $request->validate([
            'terms_accepted' => 'required|accepted',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after:pickup_date',
            'available_car_id' => 'required|exists:cars,id',
        ]);

        $carToBook = Car::findOrFail($request->available_car_id);

        if ($carToBook->status !== 'Available') {
            return redirect()->route('cars')->with('error', 'The selected car is no longer available.');
        }

        $carToBook->update(['status' => 'Booked']);

        $pickupDate = Carbon::parse($request->pickup_date);
        $returnDate = Carbon::parse($request->return_date);
        $rentalDays = $pickupDate->diffInDays($returnDate) + 1;

        $amountDue = 0;
        if ($carToBook->carModel->car_type === 'Sedan') {
            $amountDue = 500 * $rentalDays;
        } elseif ($carToBook->carModel->car_type === 'SUV') {
            $amountDue = 1000 * $rentalDays;
        } elseif ($carToBook->carModel->car_type === 'Pick-up') {
            $amountDue = 1500 * $rentalDays;
        }

        $booking = new Booking([
            'customer_id' => Auth::user()->customer->id,
            'car_id' => $carToBook->id,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'amount_due' => $amountDue,
        ]);
        $booking->save();

        $bookingStatus = new BookingStatus([
            'booking_id' => $booking->id,
            'status' => 'Unpaid',
            'updated_by_id' => Auth::id(),
        ]);
        $bookingStatus->save();

        $booking->update(['latest_status_id' => $bookingStatus->id]);
        
        return redirect()->route('booking')->with('success', 'Booking added successfully!');
    }
}
