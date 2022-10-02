<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomView extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
