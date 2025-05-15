<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Car;
use App\Models\CarDamage;
use App\Models\CarDamageStatus;
use App\Models\CarModel;
use App\Models\Payment;
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
                                ->paginate(4);
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

    /**
     * Processing of booking details to add booking,
     * status and payment to database
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function processAddBooking(Request $request): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after:pickup_date',
            'car_model_id' => 'required|exists:car_models,id',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|string|in:paymaya,gcash,cash', 
            'paymaya_ref' => 'nullable|required_if:payment_method,paymaya|string',
            'paymaya_account_name' => 'nullable|required_if:payment_method,paymaya|string',
            'gcash_ref' => 'nullable|required_if:payment_method,gcash|string',
            'gcash_account_name' => 'nullable|required_if:payment_method,gcash|string',
            'agreement' => 'required|accepted',
        ]);

        $user = Auth::user();
        $carModelId = $request->input('car_model_id');
        $pickupDate = $request->input('pickup_date');
        $returnDate = $request->input('return_date');
        $totalAmount = $request->input('total_amount');
        $paymentMethod = $request->input('payment_method');

        $availableCar = Car::where('car_model_id', $carModelId)
            ->where('status', 'Available')
            ->first();

        if (!$availableCar) {
            return redirect()->route('cars')->with('error', 'The selected car is no longer available.');
        }

        $booking = Booking::create([
            'customer_id' => $user->customer->id,
            'car_id' => $availableCar->id,
            'pickup_date' => $pickupDate,
            'return_date' => $returnDate,
            'amount_due' => $totalAmount,
        ]);

        $availableCar->update(['status' => 'Booked']);

        $status = '';
        $additionalNotes = '';
        $payment = null;

        if ($paymentMethod === 'gcash' || $paymentMethod === 'paymaya') {
            $status = 'paid';
            $refNumber = ($paymentMethod === 'gcash') ? $request->input('gcash_ref') : $request->input('paymaya_ref');
            $accountName = ($paymentMethod === 'gcash') ? $request->input('gcash_account_name') : $request->input('paymaya_account_name');

            $additionalNotes = 'Payment via ' . ucfirst($paymentMethod) . '. Ref No: ' . $refNumber . ', Account Name: ' . $accountName;

            $payment = Payment::create([
                'booking_id' => $booking->id,
                'payment_method' => $paymentMethod,
                'paid_amount' => $totalAmount,
                'ref_number' => $refNumber,
                'is_verified' => true,
            ]);
        } elseif ($paymentMethod === 'cash') {
            $status = 'Unpaid';
            $additionalNotes = 'Pay at the counter.';
        } else {
            return redirect()->route('cars')->with('error', 'Booking unsuccessful.');
        }

        // Create the initial booking status record
        $bookingStatus = BookingStatus::create([
            'booking_id' => $booking->id,
            'status' => $status,
            'status_date' => Carbon::now(),
            'additional_notes' => $additionalNotes,
            'updated_by_id' => $user->id,
        ]);

        // Update the booking's latest_status_id
        $booking->update(['latest_status_id' => $bookingStatus->id]);

        return redirect()->route('booking')->with('success', 'Booking submitted successfully!');
    }

    /**
     * Cancellation of Bookings
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function cancelBookingUser(Request $request): RedirectResponse
    {
        // dd($request->all());

        $user = Auth::user();
        $booking = Booking::findOrFail($request->booking_id);

        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'cancel_reason' => 'required',
        ]);

        $bookingCancelStatus = BookingStatus::create([
            'booking_id' => $request->booking_id,
            'status' => 'Cancelled',
            'status_date' => Carbon::now(),
            'additional_notes' => $request->cancel_reason,
            'updated_by_id' => $user->id,
        ]);

        $booking->update(['latest_status_id' => $bookingCancelStatus->id]);

        return redirect()->route('booking')->with('success', 'Booking cancelled successfully!');
    }

    /**
     * Processing over the counter booking payments
     * @param int $booking_id
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function processOfflinePaymentAdmin(int $booking_id, Request $request): RedirectResponse
    {
        // dd($booking_id, $request->all());
        $user = Auth::user();
        $booking = Booking::findOrFail($booking_id);

        Payment::create([
            'booking_id' => $booking_id,
            'payment_method' => 'cash',
            'paid_amount' => $booking->amount_due,
            'is_verified' => true,
        ]);

        $bookingPaidStatus = BookingStatus::create([
            'booking_id' => $booking_id,
            'status' => 'Paid',
            'status_date' => Carbon::now(),
            'additional_notes' => 'Paid at the counter.',
            'updated_by_id' => $user->id,
        ]);

        $booking->update(['latest_status_id' => $bookingPaidStatus->id]);

        return redirect()->route('booking-management')->with('success', 'Payment verified successfully!');
    }

    public function approveBooking(int $booking_id, Request $request): RedirectResponse
    {
        $user = Auth::user();
        $booking = Booking::findOrFail($booking_id);

        $bookingPaidStatus = BookingStatus::create([
            'booking_id' => $booking_id,
            'status' => 'Approved',
            'status_date' => Carbon::now(),
            'additional_notes' => 'Booking approved.',
            'updated_by_id' => $user->id,
        ]);

        $booking->update(['latest_status_id' => $bookingPaidStatus->id]);

        return redirect()->route('booking-management')->with('success', 'Booking approved successfully!');
    }

    public function changeApprovedStatus(int $booking_id, Request $request): RedirectResponse
    {
        $request->validate([
            'approval_type' => 'required',
        ]);

        $user = Auth::user();
        $booking = Booking::findOrFail($booking_id);

        if ($request->approval_type === 'for-pickup') {
            $bookingPaidStatus = BookingStatus::create([
                'booking_id' => $booking_id,
                'status' => 'For Pick-Up',
                'status_date' => Carbon::now(),
                'additional_notes' => 'Car can now be picked-up.',
                'updated_by_id' => $user->id,
            ]);
    
            $booking->update(['latest_status_id' => $bookingPaidStatus->id]);

            return redirect()->route('booking-management')->with('success', 'Booking updated successfully!');
        } elseif ($request->approval_type === 'used-now') {
            $bookingPaidStatus = BookingStatus::create([
                'booking_id' => $booking_id,
                'status' => 'Ongoing',
                'status_date' => Carbon::now(),
                'additional_notes' => 'Car is being used. Booking ongoing.',
                'updated_by_id' => $user->id,
            ]);
    
            $booking->update(['latest_status_id' => $bookingPaidStatus->id]);

            return redirect()->route('booking-management')->with('success', 'Booking updated successfully!');
        } else {
            return redirect()->route('booking-management')->with('error', 'Booking update unsuccessful.');
        }
    }

    public function userPicksUpCar(int $booking_id, Request $request): RedirectResponse
    {
        $user = Auth::user();
        $booking = Booking::findOrFail($booking_id);

        $bookingPaidStatus = BookingStatus::create([
            'booking_id' => $booking_id,
            'status' => 'Ongoing',
            'status_date' => Carbon::now(),
            'additional_notes' => 'Car is being used. Booking ongoing.',
            'updated_by_id' => $user->id,
        ]);

        $booking->update(['latest_status_id' => $bookingPaidStatus->id]);
        $booking->update(['actual_pickup_time' => now()->format('g A')]);

        return redirect()->route('booking-management')->with('success', 'Booking update successful.');
    }

    public function userReturnsCar(int $booking_id, Request $request): RedirectResponse
    {
        $user = Auth::user();
        $booking = Booking::findOrFail($booking_id);
        $car = $booking->car;

        if ($request->damage_status === 'no-issue') {
            $carReturnStatus = BookingStatus::create([
                'booking_id' => $booking_id,
                'status' => 'Successful',
                'status_date' => Carbon::now(),
                'additional_notes' => 'Car has now been returned. Booking complete.',
                'updated_by_id' => $user->id,
            ]);

            $car->update(['status' => 'Available']);
            $booking->update(['latest_status_id' => $carReturnStatus->id]);

            return redirect()->route('booking-management')->with('success', 'Booking update successful.');
        } elseif ($request->damage_status === 'returned-damage') {
            $carDamagedStatus = BookingStatus::create([
                'booking_id' => $booking_id,
                'status' => 'Successful',
                'status_date' => Carbon::now(),
                'additional_notes' => 'Car returned with damage.',
                'updated_by_id' => $user->id,
            ]);

            $car->update(['status' => 'Damaged']);
            $booking->update(['latest_status_id' => $carDamagedStatus->id]);

            $file = $request->file('car-image');
            $extension = $file->getClientOriginalExtension();
            $filename = $booking->id . '_cardamage.' . $extension;
            $file->move(public_path(path: 'assets/car_damage_img'), $filename);
            $path = 'assets/car_damage_img/' . $filename;

            $carDamage = CarDamage::create([
                'booking_id' => $booking_id,
                'repair_desc' => $request->damage_desc,
                'damage_img_path' => $path,
            ]);

            $damageStatus = CarDamageStatus::create([
                'car_damage_id' => $carDamage->id,
                'additional_notes' => $request->damage_desc,
                'updated_by_id' => Auth::user()->id,
            ]);

            $carDamage->update(['latest_repair_status' => $damageStatus->id]);
        }

        return redirect()->route('booking-management')->with('success', 'Booking update successful.');
    }

    /**
     * Employee cancellation of bookings
     * @param int $booking_id
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function cancelBookingEmployee(int $booking_id, Request $request): RedirectResponse
    {
        $request->validate([
            'cancel_reason' => 'required|string',
            'confirm_cancel' => 'required|accepted'
        ]);

        $user = Auth::user();
        $booking = Booking::findOrFail($booking_id);

        // Create cancellation status
        $bookingCancelStatus = BookingStatus::create([
            'booking_id' => $booking_id,
            'status' => 'Cancelled',
            'status_date' => Carbon::now(),
            'additional_notes' => $request->cancel_reason,
            'updated_by_id' => $user->id,
        ]);

        // Update booking's latest status
        $booking->update(['latest_status_id' => $bookingCancelStatus->id]);

        // Update car status back to Available if it was Booked
        if ($booking->car && $booking->car->status === 'Booked') {
            $booking->car->update(['status' => 'Available']);
        }

        return redirect()->route('booking-management')->with('success', 'Booking cancelled successfully!');
    }
}
