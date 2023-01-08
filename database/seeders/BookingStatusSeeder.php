<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'paid',
                'label' => 'Paid',
            ],
            [
                'name' => 'on-hold',
                'label' => 'On Hold',
            ],
            [
                'name' => 'reserved',
                'label' => 'Reserved',
            ],
            [
                'name' => 'past',
                'label' => 'Past',
            ],
            [
                'name' => 'cancelled',
                'label' => 'Cancelled',
            ]
        ];

        foreach ($statuses as $status) {
            BookingStatus::create($status);
        }
    }
}
