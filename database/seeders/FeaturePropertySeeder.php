<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Property;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class FeaturePropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Property::all() as $property) {
            $ids = Feature::all()->pluck('id')->toArray();
            shuffle($ids);

            for ($i = 0; $i < random_int(count($ids) / 2, count($ids)); $i++) {
                $property->features()->attach(Feature::find($i));
            }
        }
    }
}
