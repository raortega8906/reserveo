<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'duration_service'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
