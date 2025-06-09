<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'reservation_date',
        'reservation_time',
        'status',
        'notes'
    ];

    protected $casts = [
        'reservation_date' => 'date',
        'reservation_time' => 'datetime:H:i',
        'status' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
