<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model_name',
        'model_year',
        'model_desc',
        'color',
        'engine_type',
        'engine_displacement',
        'fuel_type',
        'transmission',
        'seat_capacity',
        'car_dimensions',
        'car_type',
        'img_file_path',
    ];

    /**
     * Get all of the cars for the CarModel.
     */
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class, 'model_id');
    }
}
