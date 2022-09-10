<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            $ids = Property::all()->pluck('id')->toArray();
            shuffle($ids);

            for ($i = 0; $i < random_int(count($ids) / 3, count($ids)); $i++) {
                $user->favorites()->attach(Property::find($i));
            }
        }
    }
}
