<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $attributes = [
        'status' => 'pending',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor para fecha formateada en español
    public function getFormattedDateAttribute()
    {
        return $this->reservation_date?->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY');
    }

    // Accessor para fecha corta en español
    public function getShortDateAttribute()
    {
        return $this->reservation_date?->locale('es')->isoFormat('D MMM YYYY');
    }

    // Accessor para hora formateada
    public function getFormattedTimeAttribute()
    {
        return $this->reservation_time?->format('H:i');
    }

    // Accessor para fecha y hora completa
    public function getFullDateTimeAttribute()
    {
        if (!$this->reservation_date || !$this->reservation_time) {
            return null;
        }
        
        $dateTime = Carbon::parse($this->reservation_date->format('Y-m-d') . ' ' . $this->reservation_time->format('H:i:s'));
        return $dateTime->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY [a las] HH:mm');
    }
}
