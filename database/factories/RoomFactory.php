<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\RoomStatus;
use App\Models\RoomType;
use App\Models\RoomView;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'property_id' => Property::all()->random()->id,
            'room_status_id' => RoomStatus::firstWhere('name', 'active')->id,
            'room_type_id' => RoomType::all()->random()->id,
            'room_view_id' => RoomView::all()->random()->id,
            'number_of_rooms' => $this->faker->numberBetween(1, 5),
            'number_of_persons' => $this->faker->numberBetween(1, 8),
            'size' => $this->faker->numberBetween(20, 200),
            'price' => $this->faker->randomFloat(1, 5.0, 500.0),
            'large_beds' => $this->faker->numberBetween(0, 5),
            'double_beds' => $this->faker->numberBetween(0, 5),
            'single_beds' => $this->faker->numberBetween(0, 5),
            'sofa_beds' => $this->faker->numberBetween(0, 5),
        ];
    }
}
