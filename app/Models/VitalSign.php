<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VitalSign extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_record_id',
        'blood_pressure',
        'heart_rate',
        'temperature',
        'weight_kg',
        'height_cm',
        'respiratory_rate',
        'oxygen_saturation',
        'notes',
    ];

    public function consultationRecord(): BelongsTo
    {
        return $this->belongsTo(ConsultationRecord::class);
    }
}
