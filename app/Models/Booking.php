<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
