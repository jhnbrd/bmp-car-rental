<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'user_id',
        'role',
        'is_active',
    ];

    protected $casts = [
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
