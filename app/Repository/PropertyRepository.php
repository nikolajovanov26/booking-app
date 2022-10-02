<?php

namespace App\Repository;

use App\Models\Country;
use App\Models\Property;
use App\Models\PropertyStatus;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Auth;

class PropertyRepository
{
    public function store(array $data, string $status): void
    {
        Property::create([
            'user_id' => Auth::user()->id,
            'property_status_id' => PropertyStatus::firstWhere('name', $status)->id,
            'property_type_id' => PropertyType::firstWhere('name', $data['property_type_id'])->id,
            'country_id' => Country::firstWhere('name', $data['country_id'])->id,
            'name' => $data['name'],
            'slug' => $data['slug'],
            'main_photo' => null,
            'stars' => $data['stars'] ?? null,
            'email' => $data['email'],
            'phone_number' => $data['phone_number'] ?? null,
            'address' => $data['address'],
            'city' => $data['city'],
            'zip_code' => $data['zip_code'],
            'pets_allowed' => isset($data['pets_allowed']),
            'check_in_from' => $data['check_in_from'],
            'check_in_to' => $data['check_in_to'],
            'check_out_from' => $data['check_out_from'],
            'check_out_to' => $data['check_out_to'],
            'description' => $data['description'],
            'cancellation_policy' => $data['cancellation_policy'] ?? null,
        ]);
    }

    public function update(array $data, Property $property, string $status): void
    {
        $property->property_status_id = PropertyStatus::firstWhere('name', $status)->id;
        $property->property_type_id = PropertyType::firstWhere('name', $data['property_type_id'])->id;
        $property->country_id = Country::firstWhere('label', $data['country_id'])->id;
        $property->name = $data['name'];
        $property->slug = $data['slug'];
        $property->main_photo = null;
        $property->stars = $data['stars'] ?? null;
        $property->email = $data['email'];
        $property->phone_number = $data['phone_number'] ?? null;
        $property->address = $data['address'];
        $property->city = $data['city'];
        $property->zip_code = $data['zip_code'];
        $property->pets_allowed = isset($data['pets_allowed']);
        $property->check_in_from = $data['check_in_from'];
        $property->check_in_to = $data['check_in_to'];
        $property->check_out_from = $data['check_out_from'];
        $property->check_out_to = $data['check_out_to'];
        $property->description = $data['description'];
        $property->cancellation_policy = $data['cancellation_policy'] ?? null;

        if($property->isDirty()) {
            $property->save();
        }
    }
}
