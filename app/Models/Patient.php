<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'date_of_birth',
        'phone',
        'gender',
        'address',
        'emergency_contact_name',
        'emergency_contact_phone',
        'blood_type'
    ];
    use HasFactory;

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class);
    }

    public function allergies(): HasMany
    {
        return $this->hasMany(PatientAllergy::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function consultationRecords(): HasMany
    {
        return $this->hasMany(ConsultationRecord::class);
    }
}
