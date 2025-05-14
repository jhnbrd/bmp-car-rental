<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Payment;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::insert(self::$bookings);
        BookingStatus::insert(self::$booking_statuses);
        Payment::insert(self::$payments);

        $this->updateLatestStatusIds();
    }

    protected static $bookings = [
        // Booking Sample 1 (Initial Status: For Payment)
        [
            'customer_id' => 1,
            'car_id' => 3,
            'pickup_date' => '2025-05-16 00:00:00',
            'return_date' => '2025-05-17 00:00:00',
            'amount_due' => 500.00,
        ],
        // Booking Sample 2 (Initial Status: Due for Return) (For Successful Booking)
        [
            'customer_id' => 2,
            'car_id' => 6,
            'pickup_date' => '2025-05-14 00:00:00',
            'return_date' => '2025-05-15 00:00:00',
            'amount_due' => 500.00,
        ],
        //Booking Sample 3 (Initial Status: Due for Return) (For Damaged Car)
        [
            'customer_id' => 2,
            'car_id' => 16,
            'pickup_date' => '2025-05-14 00:00:00',
            'return_date' => '2025-05-15 00:00:00',
            'amount_due' => 1000.00,
        ],
    ];
    protected static $booking_statuses = [
        // BookingStatus for Booking Sample 1
        [
            'booking_id' => 1,
            'status' => 'Unpaid',
            'status_date' => '2025-05-15 00:53:41',
            'additional_notes' => 'Pay at the counter.', 
            'updated_by_id' => 1,
        ],
        // BookingStatus for Booking Sample 2
        [
            'booking_id' => 2,
            'status' => 'Due for Return',
            'status_date' => '2025-05-15 00:54:28',
            'additional_notes' => 'Car must be returned immediately.', 
            'updated_by_id' => 1,
        ],
        // BookingStatus for Booking Sample 3
        [
            'booking_id' => 3,
            'status' => 'Due for Return',
            'status_date' => '2025-05-15 01:30:28',
            'additional_notes' => 'Car must be returned immediately.', 
            'updated_by_id' => 1,
        ],
    ];

    protected static $payments = [
        // Payment for Due 1
        [
            'booking_id' => 2,
            'payment_method' => 'cash',
            'paid_amount' => 500.00,
            'is_verified' => true,
        ],
        // Payment for Due 2
        [
            'booking_id' => 3,
            'payment_method' => 'cash',
            'paid_amount' => 1000.00,
            'is_verified' => true,
        ],
    ];

    private function updateLatestStatusIds()
    {
        foreach (self::$bookings as $bookingData) {
            $booking = Booking::where('customer_id', $bookingData['customer_id'])
                ->where('car_id', $bookingData['car_id'])
                ->first(); // Assuming customer_id and car_id are unique for a booking

            if ($booking) {
                $latestStatus = BookingStatus::where('booking_id', $booking->id)
                    ->orderBy('status_date', 'desc')
                    ->first();

                if ($latestStatus) {
                    $booking->latest_status_id = $latestStatus->id;
                    $booking->save();
                }
            }
        }
    }
}
