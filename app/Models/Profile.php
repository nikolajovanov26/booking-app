<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsToMany(Country::class);
    }

    public function user()
    {
        return $this->belongsToMany(Property::class);
    }
}
