<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
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
                'name' => 'hotel',
                'label' => 'Hotel',
            ],
            [
                'name' => 'apartment',
                'label' => 'Apartment',
            ],
            [
                'name' => 'villa',
                'label' => 'Villa',
            ],
            [
                'name' => 'house',
                'label' => 'House',
            ]
        ];

        foreach ($types as $type) {
            PropertyType::create($type);
        }
    }
}
