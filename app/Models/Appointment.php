<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'scheduled_date',
        'scheduled_time',
        'status',
        'type',
        'reason',
        'cancellation_reason',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'scheduled_date' => 'date',
        'scheduled_time' => 'datetime:H:i:s',
    ];

    use HasFactory;

    public function patient():BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function facility():BelongsTo
    {
        return $this->belongsTo(Facility::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function consultationRecord(): HasOne
    {
        return $this->hasOne(ConsultationRecord::class);
    }

}
