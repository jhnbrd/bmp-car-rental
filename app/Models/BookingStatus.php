<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'status',
        'status_date',
        'additional_notes',
        'updated_by_id'
    ];
}
