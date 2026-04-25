<?php

namespace App\Actions\Patients\Allergies;
use App\Models\Patient;
use App\Models\PatientAllergy;

class DeletePatientAllergyAction
{
    public function execute(PatientAllergy $patientAllergy): void
    {
        $patientAllergy->delete();
    }
}
