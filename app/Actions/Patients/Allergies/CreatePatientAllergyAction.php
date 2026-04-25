<?php

namespace App\Actions\Patients\Allergies;

use App\Models\Patient;
use App\Models\PatientAllergy;

class CreatePatientAllergyAction
{
    public function execute(Patient $patient, array $data): PatientAllergy
    {
        return $patient->allergies()->create($data);
    }
}
