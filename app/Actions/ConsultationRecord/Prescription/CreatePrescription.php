<?php

namespace App\Actions\ConsultationRecord\Prescription;
use App\Models\ConsultationRecord;
use App\Models\Prescription;

class CreatePrescription
{
    public function execute(ConsultationRecord $consultation, array $data): Prescription
    {
        $prescription = new Prescription($data);
        $prescription->consultation_record_id = $consultation->id;
        $prescription->save();

        return $prescription;
    }
}
