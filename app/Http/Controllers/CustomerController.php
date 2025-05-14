<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Car;
use App\Models\Booking;
use App\Models\BookingStatus;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function home(): View
    {
        return view('customer.home');
    }
    public function contact_user(): View
    {
        return view('contact_user');
    }
    public function contacts(): View
    {
        return view('guest.contacts');
    }
    public function userprofile(): View
    {
        return view('userprofile');
    }

    public function termsCondition(int $car_model, Request $request): RedirectResponse|View
    {
        // dd($car_model);
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

        $carModel = CarModel::findOrFail($car_model);

        return view('terms_condition', compact('carModel', 'availableCar', 'pickupDate', 'returnDate'));
    }

    public function processTermsConditions(int $car_model, Request $request): RedirectResponse
    {
        try {
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
    
            // return redirect()->route('payment', ['booking' => $booking->id]);
            return redirect()->route('booking')->with('success', 'Booking added successfully!');

    
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function payment(int $booking_id, Request $request): View|RedirectResponse
    {
        $bookingId = $request->route('booking');

        if (!$bookingId) {
            return redirect()->route('cars')->with('error', 'Booking ID is missing.'); 
        }

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return redirect()->route('cars')->with('error', 'Booking not found.'); // Or redirect
        }

        if ($booking->customer_id !== Auth::user()->customer->id) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this booking.');
        }

        $latestStatus = $booking->latestStatus->status;

        if ($latestStatus === 'Paid') {
            return redirect()->route('booking.confirmation', ['booking' => $booking->id])
                ->with('success', 'This booking is already paid.');
        } elseif ($latestStatus === 'Cancelled') {
            return redirect()->route('home')->with('error', 'This booking has been cancelled.');
        } elseif ($latestStatus !== 'Unpaid') {
            return redirect()->route('home')->with('error', 'This booking is in an invalid state for payment.');
        }

        return view('payment', compact('booking'));
    }
}
