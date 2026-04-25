<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'phone' => '1234567890',
            'password' => 'password',
        ]);

        // Create additional users
        User::factory(5)->create();
    }
}
