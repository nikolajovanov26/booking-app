<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsToMany(Country::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function owner()
    {
        return $this->belongsToMany(User::class);
    }

    public function status()
    {
        return $this->belongsToMany(PropertyStatus::class);
    }

    public function type()
    {
        return $this->belongsToMany(PropertyType::class);
    }
}
