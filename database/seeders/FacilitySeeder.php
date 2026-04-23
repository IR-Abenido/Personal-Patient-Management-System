<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        // Get the first user or create one if none exists
        $user = User::first() ?? User::factory()->create([
            'name' => 'Facility Owner',
            'email' => 'facilityowner@example.com',
            'phone' => '1112223333',
            'password' => 'password',
        ]);

        Facility::create([
            'user_id' => $user->id,
            'name' => 'Central Hospital',
            'address' => '123 Main St, Cityville',
        ]);
        Facility::create([
            'user_id' => $user->id,
            'name' => 'Westside Clinic',
            'address' => '456 West Ave, Townsville',
        ]);
        Facility::create([
            'user_id' => $user->id,
            'name' => 'Eastside Health Center',
            'address' => '789 East Blvd, Villagetown',
        ]);
    }
}
