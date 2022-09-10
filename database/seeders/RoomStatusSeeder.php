<?php

namespace Database\Seeders;

use App\Models\RoomStatus;
use Illuminate\Database\Seeder;

class RoomStatusSeeder extends Seeder
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
                'name' => 'active',
                'label' => 'Active',
            ],
            [
                'name' => 'booked',
                'label' => 'Booked',
            ],
            [
                'name' => 'draft',
                'label' => 'Draft',
            ]
        ];

        foreach ($statuses as $status) {
            RoomStatus::create($status);
        }
    }
}
