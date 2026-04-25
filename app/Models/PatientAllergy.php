<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientAllergy extends Model
{
    protected $fillable = ['allergy_name', 'severity', 'notes'];

    use HasFactory;
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
