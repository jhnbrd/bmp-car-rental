<?php

namespace App\Observers;

use App\Models\Booking; // Import your Booking model
use App\Models\BookingStatus; // Import your BookingStatus model
use Carbon\Carbon; // Import Carbon for date handling

class BookingObserver
{
    /**
     * Handle the Booking "updated" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function updated(Booking $booking)
    {
        $now = Carbon::now();

        // Check if the pickup_date is today and if the latest status is 'Approved'
        if (
            $now->isSameDay($booking->pickup_date) &&
            $booking->latestStatus->status === 'Approved'
        ) {
            $this->createBookingStatus(
                $booking,
                'For Pick-Up',
                $booking->pickup_date,
                'Car can now be picked-up'
            );
        }

        // Check if the return_date is in the past and the booking is not yet returned
        if (
            $now->isPast($booking->return_date) &&
            $booking->latestStatus->status !== 'Returned' &&
            $booking->latestStatus->status !== 'Due for Return'
        ) {
            $this->createBookingStatus(
                $booking,
                'Due for Return',
                $booking->return_date,
                'Car needs to be returned immediately'
            );
        }
    }

    /**
     * Helper function to create a new BookingStatus.
     *
     * @param  \App\Models\Booking  $booking
     * @param  string  $status
     * @param  \Carbon\Carbon  $date
     * @param  string|null $notes
     * @return void
     */
    private function createBookingStatus(Booking $booking, $status, Carbon $date, ?string $notes = null)
    {
        $newStatus = new BookingStatus();
        $newStatus->booking_id = $booking->id;
        $newStatus->status = $status;
        $newStatus->status_date = Carbon::now();
        $newStatus->pickup_date = $date;
        $newStatus->additional_notes = $notes; // Set additional_notes
        $newStatus->save();

        // Update the booking's latest_status_id.
        $booking->latest_status_id = $newStatus->id;
        $booking->save();
    }
}
