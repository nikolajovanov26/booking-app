<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = [
            [
                'name' => 'pay-at-property',
                'label' => 'Pay at Property',
            ],
            [
                'name' => 'check',
                'label' => 'Check',
            ],
            [
                'name' => 'bank-transfer',
                'label' => 'Bank Transfer',
            ],
            [
                'name' => 'stripe',
                'label' => 'Stripe',
            ]
        ];

        foreach ($payments as $payment) {
            PaymentMethod::create($payment);
        }
    }
}
