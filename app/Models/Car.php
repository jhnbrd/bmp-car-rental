<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_model_id',
        'odometer',
        'license_plate',
        'registration_number',
        'registration_date',
        'status',
        'damage_cost',
        'damage_description'
    ];

    protected $casts = [
        'registration_date' => 'date',
        'damage_cost' => 'decimal:2'
    ];

    /**
     * Get the carModel that owns the Car.
     */
    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    /**
     * Get the damage records for the car.
     */
    public function damageRecords(): HasMany
    {
        return $this->hasMany(DamageRecord::class);
    }
}
