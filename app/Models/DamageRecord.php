<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamageRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'reported_by',
        'repair_cost',
        'damage_description',
        'damage_date',
        'repair_date',
        'status'
    ];

    protected $casts = [
        'damage_date' => 'date',
        'repair_date' => 'date',
        'repair_cost' => 'decimal:2'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
} 