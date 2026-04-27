<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            FacilitySeeder::class,
            ScheduleSeeder::class,
            PatientSeeder::class,
            PatientAllergySeeder::class,
            AppointmentSeeder::class,
            ConsultationRecordSeeder::class,
            VitalSignSeeder::class,
            PrescriptionSeeder::class,
        ]);
    }
}
