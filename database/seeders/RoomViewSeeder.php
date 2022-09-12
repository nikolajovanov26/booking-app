<?php

namespace Database\Seeders;

use App\Models\RoomView;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomViewSeeder extends Seeder
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
                'name' => 'sea',
                'label' => 'Sea View',
            ],
            [
                'name' => 'mountain',
                'label' => 'Mountain View',
            ],
            [
                'name' => 'lake',
                'label' => 'Lake View',
            ],
            [
                'name' => 'city',
                'label' => 'City View',
            ]
        ];

        foreach ($types as $type) {
            RoomView::create($type);
        }
    }
}
