<?php

namespace App\Actions\Patients\Allergies;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;

class GetPatientAllergiesAction
{
    public function execute(Patient $patient): Collection
    {
        return $patient->allergies;
    }
}
