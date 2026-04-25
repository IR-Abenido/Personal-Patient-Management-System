<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\PatientAllergy;
use Illuminate\Database\Seeder;

class PatientAllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all patients
        $patients = Patient::all();

        if ($patients->isEmpty()) {
            $this->command->warn('No patients found. Run PatientSeeder first.');
            return;
        }

        // Assign 0-3 allergies per patient
        foreach ($patients as $patient) {
            $allergyCount = rand(0, 3);
            PatientAllergy::factory($allergyCount)->create([
                'patient_id' => $patient->id,
            ]);
        }
    }
}
