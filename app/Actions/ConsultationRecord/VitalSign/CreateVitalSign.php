<?php

namespace App\Actions\ConsultationRecord\VitalSign;

use App\Models\ConsultationRecord;
use App\Models\VitalSign;

class CreateVitalSign{
    public function execute(ConsultationRecord $consultation, array $data): VitalSign
    {
        return $consultation->vitalSigns()->create([
            'consultation_record_id' => $consultation->id,
            'blood_pressure' => $data['blood_pressure'],
            'heart_rate' => $data['heart_rate'],
            'temperature' => $data['temperature'],
            'respiratory_rate' => $data['respiratory_rate'],
            'oxygen_saturation' => $data['oxygen_saturation'],
            'weight_kg' => $data['weight_kg'],
            'height_cm' => $data['height_cm'],
            'notes' => $data['notes']
        ]);
    }
}
