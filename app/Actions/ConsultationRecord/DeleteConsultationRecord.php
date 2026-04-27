<?php

namespace App\Actions\ConsultationRecord;

use App\Models\ConsultationRecord;

class DeleteConsultationRecord
{
    public function execute(ConsultationRecord $consultationRecord): void
    {
        $consultationRecord->delete();
    }
}
