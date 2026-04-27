<?php

namespace App\Actions\ConsultationRecord\VitalSign;

use App\Models\VitalSign;

class DeleteVitalSign {
    public function execute(VitalSign $vitalSign): void
    {
        $vitalSign->delete();
    }
}
