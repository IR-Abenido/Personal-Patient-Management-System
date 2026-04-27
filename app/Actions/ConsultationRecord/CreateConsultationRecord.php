<?php

namespace App\Actions\ConsultationRecord;

use App\Models\Appointment;
use App\Models\ConsultationRecord;
use App\Models\User;

class CreateConsultationRecord
{
    public function execute(User $user, Appointment $appointment, array $data): ConsultationRecord
    {
        $consultationRecord = ConsultationRecord::create([
            'appointment_id' => $appointment->id,
            'user_id' => $user->id,
            'patient_id' => $appointment->patient_id,
            'diagnosis' => $data['diagnosis'],
            'notes' => $data['notes'],
            'follow_up_date' => $data['follow_up_date'] ?? null,
            'follow_up_notified_at' => null,
        ]);

        return $consultationRecord;
    }
}
