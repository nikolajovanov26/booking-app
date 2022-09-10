<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CountrySeeder::class,
            UserSeeder::class,
            PropertyTypeSeeder::class,
            PropertyStatusSeeder::class,
            RoomTypeSeeder::class,
            RoomStatusSeeder::class,
            RoomViewSeeder::class,
            FeatureSeeder::class,
            PropertySeeder::class,
            FeaturePropertySeeder::class,
            RoomSeeder::class,
            FavoritesSeeder::class,
            ReviewSeeder::class,
            NotificationSeeder::class,
            TransactionStatusSeeder::class,
            BookingStatusSeeder::class
        ]);
    }
}
