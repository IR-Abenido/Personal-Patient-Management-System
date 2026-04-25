<?php

namespace App\Actions\Patients\Allergies;
use App\Models\Patient;
use App\Models\PatientAllergy;

class UpdatePatientAllergyAction
{
    public function execute(PatientAllergy $patientAllergy, array $data): PatientAllergy
    {
        $patientAllergy->update($data);
        return $patientAllergy;
    }
}
