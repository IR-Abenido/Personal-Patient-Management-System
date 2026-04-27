<?php

namespace App\Actions\ConsultationRecord;

use App\Models\User;
use Illuminate\Support\Collection;

class GetAllConsultationRecord
{
    public function execute(User $user): Collection
    {
        return $user->consultationRecords()->with(['appointment.patient', 'appointment.facility', 'prescription', 'vitals'])->get();
    }
}
