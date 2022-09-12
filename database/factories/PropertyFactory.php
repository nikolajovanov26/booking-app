<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\PropertyStatus;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->words(3, true);

        return [
            'user_id' => User::all()->random()->id,
            'property_status_id' => PropertyStatus::all()->random()->id,
            'property_type_id' => PropertyType::all()->random()->id,
            'country_id' => Country::all()->random()->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'stars' => $this->faker->numberBetween(0, 5),
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'zip_code' => $this->faker->numerify,
            'pets_allowed' => $this->faker->boolean,
            'check_in_from' => $this->faker->time('H:i'),
            'check_in_to' => $this->faker->time('H:i'),
            'check_out_from' => $this->faker->time('H:i'),
            'check_out_to' => $this->faker->time('H:i'),
            'description' => $this->faker->paragraphs(4, true),
            'cancellation_policy' => $this->faker->paragraphs(4, true),
        ];
    }
}
