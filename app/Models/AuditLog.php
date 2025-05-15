<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditLog extends Model
{
    protected $table = 'audit_logs';

    protected $fillable = [
        'timestamp',
        'user_id',
        'action',
        'module',
        'description',
        'old_values',
        'new_values',
        'user_agent',
        'ip_address'
    ];

    protected $casts = [
        'timestamp' => 'datetime',
        'old_values' => 'json', 
        'new_values' => 'json',
    ];

    /**
     * Get the user that performed the audit log action.
     * Added the relation
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
