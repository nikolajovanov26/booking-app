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
        return $this->belongsToMany(RoomStatus::class);
    }

    public function type()
    {
        return $this->belongsToMany(RoomType::class);
    }

    public function view()
    {
        return $this->belongsToMany(RoomView::class);
    }
}
