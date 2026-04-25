<?php

namespace App\Actions\Patients\Appointments;

use App\Models\Patient;
use App\Models\Appointment;

class CreateAppointmentAction
{
    public function execute(Patient $patient, array $data): Appointment
    {
        return $patient->appointments()->create($data);
    }
}
