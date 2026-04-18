<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'from_address',
        'to_address',
        'weight',
        'volume',
        'price',
        'contact_phone',
        'status',
        'driver_id',
        'loader_id',
        'assigned_at',
        'scheduled_at',
        'arrival_at',
        'completed_at',
        'comment',
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
        'scheduled_at' => 'datetime',
        'arrival_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public const STATUS_NEW = 'new';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_POSTPONED = 'postponed';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_COMPLETED = 'completed';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function loader()
    {
        return $this->belongsTo(User::class, 'loader_id');
    }
}
