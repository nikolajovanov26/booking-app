<?php

namespace Database\Seeders;

use App\Models\PropertyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyStatusSeeder extends Seeder
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
                'name' => 'draft',
                'label' => 'Draft',
            ]
        ];

        foreach ($statuses as $status) {
            PropertyStatus::create($status);
        }
    }
}
