<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsToMany(Property::class);
    }

    public function status()
    {
        return $this->belongsTo(RoomStatus::class, 'room_status_id');
    }

    public function type()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function view()
    {
        return $this->belongsTo(RoomView::class, 'room_view_id');
    }
}
