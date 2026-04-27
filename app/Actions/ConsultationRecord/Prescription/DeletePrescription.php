<?php

namespace App\Actions\ConsultationRecord\Prescription;

use App\Models\Prescription;

class DeletePrescription
{
    public function execute(Prescription $prescription): void
    {
        $prescription->delete();
    }
}
