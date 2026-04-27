<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultationRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'appointment_id' => $this->appointment_id,
            'patient_id' => $this->patient_id,
            'user_id' => $this->user_id,
            'diagnosis' => $this->diagnosis,
            'notes' => $this->notes,
            'follow_up_date' => $this->follow_up_date,
            'follow_up_notified_at' => $this->follow_up_notified_at,
            'created_at' => $this->created_at,
            'prescriptions' => PrescriptionResource::collection($this->whenLoaded('prescriptions')),
            'vitalSigns' => VitalSignResource::collection($this->whenLoaded('vitalSigns')),
        ];
    }
}
