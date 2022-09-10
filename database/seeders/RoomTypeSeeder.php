<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'double-room',
                'label' => 'Double Room',
            ],
            [
                'name' => 'double-room-with-balcony',
                'label' => 'Double Room with Balcony',
            ],
            [
                'name' => 'single-room',
                'label' => 'Single Room',
            ],
            [
                'name' => 'family-studio',
                'label' => 'Family Studio',
            ],
            [
                'name' => 'comfort-triple-room',
                'label' => 'Comfort Triple Room',
            ]
        ];

        foreach ($types as $type) {
            RoomType::create($type);
        }
    }
}
