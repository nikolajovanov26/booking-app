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
                'name' => 'pay-at-property',
                'label' => 'Pay at Property',
            ],
            [
                'name' => 'past',
                'label' => 'Past',
            ]
        ];

        foreach ($statuses as $status) {
            BookingStatus::create($status);
        }
    }
}
