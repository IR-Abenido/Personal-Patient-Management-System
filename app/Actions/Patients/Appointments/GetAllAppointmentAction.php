<?php

namespace App\Actions\Patients\Appointments;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;
class GetAllAppointmentAction
{
    public function execute(Patient $patient): Collection
    {
        return $patient->appointments()->get();
    }
}
