<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users and facilities
        $users = User::all();
        $facilities = Facility::all();

        if ($users->isEmpty() || $facilities->isEmpty()) {
            $this->command->warn('No users or facilities found. Run UserSeeder and FacilitySeeder first.');
            return;
        }

        // Create 3-4 schedules per user
        foreach ($users as $user) {
            Schedule::factory(rand(3, 4))->create([
                'user_id' => $user->id,
                'facility_id' => $facilities->random()->id,
            ]);
        }
    }
}
