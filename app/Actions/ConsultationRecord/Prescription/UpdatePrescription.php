<?php

namespace App\Actions\ConsultationRecord\Prescription;
use App\Models\Prescription;

class UpdatePrescription
{
    public function execute(Prescription $prescription, array $data): Prescription
    {
        $prescription->update($data);

        return $prescription;
    }
}
