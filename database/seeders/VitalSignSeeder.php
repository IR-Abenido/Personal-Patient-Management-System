<?php

namespace Database\Seeders;

use App\Models\ConsultationRecord;
use App\Models\VitalSign;
use Illuminate\Database\Seeder;

class VitalSignSeeder extends Seeder
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

        // Create 1 vital sign record per consultation
        foreach ($consultationRecords as $consultationRecord) {
            VitalSign::factory()->create([
                'consultation_record_id' => $consultationRecord->id,
            ]);
        }
    }
}
