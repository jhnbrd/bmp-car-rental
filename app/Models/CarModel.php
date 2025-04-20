<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'seat_capacity',
        'car_dimensions',
        'car_type',
        'img_file_path',
    ];
}
