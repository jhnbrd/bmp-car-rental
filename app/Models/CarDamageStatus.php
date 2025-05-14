<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarDamageStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_damage_id',
        'status',
        'status_date',
        'additional_notes',
        'updated_by_id'
    ];
}
