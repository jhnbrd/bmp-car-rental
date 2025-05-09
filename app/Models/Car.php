<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_model_id',
        'odometer',
        'license_plate',
        'registration_number',
        'registration_date',
        'status'
    ];

    /**
     * Get the carModel that owns the Car.
     */
    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }
}
