<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'booking_id',
        'payment_method',
        'paid_amount',
        'ref_number',
        'is_verified',
    ];

    /**
     * Get the booking that owns the Payment.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
