<?php

namespace App\Actions\Patients\Appointments;

use App\Models\Appointment;

class DeleteAppointmentAction
{
    public function execute(Appointment $appointment): void
    {
        $appointment->delete();
    }
}
