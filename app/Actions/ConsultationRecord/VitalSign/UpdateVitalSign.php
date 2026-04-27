<?php

namespace App\Actions\ConsultationRecord\VitalSign;

use App\Models\VitalSign;

class UpdateVitalSign{
    public function execute(VitalSign $vitalSign, array $data): VitalSign
    {
        $vitalSign->update($data);

        return $vitalSign;
    }
}
