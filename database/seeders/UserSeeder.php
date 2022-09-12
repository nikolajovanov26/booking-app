<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'role_id' => Role::firstWhere('name', 'admin')->id,
            'email' => 'nikolajovanov26@gmail.com'
        ]);

        User::factory()->create([
            'role_id' => Role::firstWhere('name', 'owner')->id,
            'email' => 'nikolajovanov@gmail.com'
        ]);

        User::factory()->create([
            'role_id' => Role::firstWhere('name', 'user')->id,
            'email' => 'nikola@gmail.com'
        ]);

        User::factory(7)->create();
    }
}
