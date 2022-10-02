<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $casts = [
        'date_from' => 'date',
        'date_to' => 'date'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function bookingStatus()
    {
        return $this->belongsTo(BookingStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
