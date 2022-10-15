<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'room_status_id',
        'room_type_id',
        'room_view_id',
        'number_of_persons',
        'size',
        'price',
        'large_beds',
        'double_beds',
        'single_beds',
        'sofa_beds',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function property()
    {
        return $this->belongsToMany(Property::class);
    }

    public function roomStatus()
    {
        return $this->belongsTo(RoomStatus::class, 'room_status_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function roomView()
    {
        return $this->belongsTo(RoomView::class, 'room_view_id');
    }
}
