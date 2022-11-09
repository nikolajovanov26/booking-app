<?php

namespace Database\Factories;

use App\Models\BookingStatus;
use App\Models\PaymentMethod;
use App\Models\Property;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\RoomType;
use App\Models\RoomView;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dateFrom = now()->addDays(mt_rand(3, 10));
        $dateTo = now()->addDays(mt_rand(10, 17));
        $nights = $dateFrom->diffInDays($dateTo);
        $pricePerNight = $this->faker->randomFloat(1, 5.0, 500.0);

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'property_id' => Property::inRandomOrder()->first()->id,
            'room_id' => Room::inRandomOrder()->first()->id,
            'payment_method_id' => PaymentMethod::inRandomOrder()->first()->id,
            'booking_status_id' => BookingStatus::inRandomOrder()->first()->id,
            'nights' => $nights,
            'price' => $nights * $pricePerNight,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'created_at' => now()->subDays(mt_rand(0, 100)),
        ];
    }
}
