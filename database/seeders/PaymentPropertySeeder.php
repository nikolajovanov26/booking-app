<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\Property;
use Illuminate\Database\Seeder;

class PaymentPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Property::all() as $property) {
            $ids = PaymentMethod::all()->pluck('id')->toArray();
            shuffle($ids);

            for ($i = 0; $i < random_int(count($ids) / 2, count($ids)); $i++) {
                $property->paymentMethods()->attach(PaymentMethod::find($i));
            }
        }
    }
}
