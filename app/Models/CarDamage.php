<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarDamage extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'repair_cost',
        'repair_desc',
        'damage_img_path',
        'latest_repair_status'
    ];

 
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function latestStatus(): BelongsTo
    {
        return $this->belongsTo(CarDamageStatus::class, 'latest_repair_status');
    }

    /**
     * Get all the booking statuses for the Booking.
     */
    public function repairStatuses(): HasMany
    {
        return $this->hasMany(CarDamageStatus::class);
    }
}

