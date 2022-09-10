<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
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
                'name' => 'refunded',
                'label' => 'Refunded',
            ]
        ];

        foreach ($statuses as $status) {
            TransactionStatus::create($status);
        }
    }
}
