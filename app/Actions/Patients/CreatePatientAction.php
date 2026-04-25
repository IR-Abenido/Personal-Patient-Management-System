<?php

namespace App\Actions\Patients;

use App\Models\Facility;
use App\Models\Patient;

class CreatePatientAction
{
    public function execute(Facility $facility, array $data): Patient
    {
        return $facility->patients()->create($data);
    }
}
