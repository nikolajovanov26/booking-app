<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'room_id',
        'booking_status_id',
        'nights',
        'price',
        'date_from',
        'date_to'
    ];

    protected $casts = [
        'date_from' => 'datetime',
        'date_to' => 'datetime'
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
