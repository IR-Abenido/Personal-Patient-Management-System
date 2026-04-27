<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\ConsultationRecord;
use Illuminate\Database\Seeder;

class ConsultationRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get completed or confirmed appointments
        $appointments = Appointment::whereIn('status', ['completed', 'confirmed'])->limit(30)->get();

        if ($appointments->isEmpty()) {
            $this->command->warn('No appointments found. Run AppointmentSeeder first.');
            return;
        }

        // Create 1 consultation record per appointment
        foreach ($appointments as $appointment) {
            ConsultationRecord::factory()->create([
                'appointment_id' => $appointment->id,
                'patient_id' => $appointment->patient_id,
                'user_id' => $appointment->user_id,
            ]);
        }
    }
}
