<?php

namespace App\Actions\Patients;

use App\Models\Facility;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;

class GetAllPatientsAction
{
    public function execute(Facility $facility): Collection
    {
        return Patient::where('facility_id', $facility->id)->get();
    }
}
