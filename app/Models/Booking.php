<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsToMany(Property::class);
    }

    public function room()
    {
        return $this->belongsToMany(Room::class);
    }

    public function status()
    {
        return $this->belongsToMany(BookingStatus::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
