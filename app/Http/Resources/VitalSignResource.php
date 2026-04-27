<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VitalSignResource extends JsonResource
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
            'consultation_record_id' => $this->consultation_record_id,
            'blood_pressure' => $this->blood_pressure,
            'heart_rate' => $this->heart_rate,
            'temperature' => $this->temperature,
            'weight_kg' => $this->weight_kg,
            'height_cm' => $this->height_cm,
            'respiratory_rate' => $this->respiratory_rate,
            'oxygen_saturation' => $this->oxygen_saturation,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
        ];
    }
}
