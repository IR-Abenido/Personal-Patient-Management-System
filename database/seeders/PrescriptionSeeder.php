<?php

namespace Database\Seeders;

use App\Models\ConsultationRecord;
use App\Models\Prescription;
use Illuminate\Database\Seeder;

class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all consultation records
        $consultationRecords = ConsultationRecord::all();

        if ($consultationRecords->isEmpty()) {
            $this->command->warn('No consultation records found. Run ConsultationRecordSeeder first.');
            return;
        }

        // Create 0-2 prescriptions per consultation record
        foreach ($consultationRecords as $consultationRecord) {
            $prescriptionCount = rand(0, 2);
            for ($i = 0; $i < $prescriptionCount; $i++) {
                Prescription::factory()->create([
                    'consultation_record_id' => $consultationRecord->id,
                ]);
            }
        }
    }
}
