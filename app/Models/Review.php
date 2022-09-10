<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsToMany(Property::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
