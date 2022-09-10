<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            [
                'name' => 'free-wifi',
                'label' => 'Free Wifi',
            ],
            [
                'name' => 'parking',
                'label' => 'Parking',
            ],
            [
                'name' => 'pool',
                'label' => 'Pool',
            ],
            [
                'name' => 'spa',
                'label' => 'Spa',
            ]
        ];

        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
