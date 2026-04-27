<?php

namespace App\Actions\ConsultationRecord\VitalSign;

use App\Models\ConsultationRecord;
use Illuminate\Database\Eloquent\Collection;

class GetAllVitalSign{
    public function execute(ConsultationRecord $consultation): Collection
    {
        return $consultation->vitalSigns()->get();
    }
}
