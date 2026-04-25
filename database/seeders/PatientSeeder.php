<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all facilities
        $facilities = Facility::all();

        if ($facilities->isEmpty()) {
            $this->command->warn('No facilities found. Run FacilitySeeder first.');
            return;
        }

        // Create 30 patients distributed across facilities
        foreach ($facilities as $facility) {
            Patient::factory(10)->create([
                'facility_id' => $facility->id,
            ]);
        }
    }
}
