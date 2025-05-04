<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'car_id',
        'pickup_date',
        'return_date',
        'amount_due',
        'latest_status_id'
    ];

    /**
     * Get the customer that owns the Booking.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the car that owns the Booking.
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Get the latest booking status for the Booking.
     */
    public function latestStatus(): BelongsTo
    {
        return $this->belongsTo(BookingStatus::class, 'latest_status_id');
    }

    /**
     * Get all the booking statuses for the Booking.
     */
    public function bookingStatuses(): HasMany
    {
        return $this->hasMany(BookingStatus::class);
    }
}
