<?php

namespace App\Actions\ConsultationRecord\Prescription;
use App\Models\ConsultationRecord;

use Illuminate\Database\Eloquent\Collection;

class GetAllPrescription
{
    public function execute(ConsultationRecord $consultation): Collection
    {
        $prescriptions = $consultation->prescription()->get();

        return $prescriptions;
    }
}
