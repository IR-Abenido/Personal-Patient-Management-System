<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all patients and users
        $patients = Patient::all();
        $users = User::all();

        if ($patients->isEmpty() || $users->isEmpty()) {
            $this->command->warn('Missing data. Ensure PatientSeeder and UserSeeder have been run.');
            return;
        }

        // Create 50 appointments
        Appointment::factory(50)->create();
    }
}
