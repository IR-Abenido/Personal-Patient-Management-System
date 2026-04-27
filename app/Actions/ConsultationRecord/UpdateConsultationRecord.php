<?php

namespace App\Actions\ConsultationRecord;

use App\Models\ConsultationRecord;

class UpdateConsultationRecord
{
    public function execute(ConsultationRecord $consultationRecord, array $data): ConsultationRecord
    {
        $consultationRecord->update([
            'diagnosis' => $data['diagnosis'] ?? $consultationRecord->diagnosis,
            'notes' => $data['notes'] ?? $consultationRecord->notes,
            'follow_up_date' => $data['follow_up_date'] ?? $consultationRecord->follow_up_date,
            'follow_up_notified_at' => $data['follow_up_notified_at'] ?? $consultationRecord->follow_up_notified_at,
        ]);

        return $consultationRecord;
    }
}
