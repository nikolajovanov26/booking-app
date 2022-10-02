<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_status_id',
        'property_type_id',
        'country_id',
        'name',
        'slug',
        'main_photo',
        'stars',
        'email',
        'phone_number',
        'address',
        'city',
        'zip_code',
        'pets_allowed',
        'check_in_from',
        'check_in_to',
        'check_out_from',
        'check_out_to',
        'description',
        'cancellation_policy',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
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
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentMethods()
    {
        return $this->belongsToMany(PaymentMethod::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function propertyStatus()
    {
        return $this->belongsTo(PropertyStatus::class);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
}
