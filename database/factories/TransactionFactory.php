<?php

namespace Database\Factories;

use App\Models\BookingStatus;
use App\Models\PaymentMethod;
use App\Models\Property;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\RoomType;
use App\Models\RoomView;
use App\Models\TransactionStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $property = Property::inRandomOrder()->first();

        return [
            'owner_id' => $property->owner->id,
            'customer_id' => User::inRandomOrder()->first()->id,
            'property_id' => $property->id,
            'room_id' => $property->rooms->random()->id,
            'transaction_status_id' => TransactionStatus::inRandomOrder()->first()->id,
            'total' => $this->faker->randomFloat(1, 50.0, 5000.0),
            'created_at' => now()->subDays(mt_rand(0, 100)),
        ];
    }
}
