<?php

namespace App\Http\Requests\ConsultationRecord;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'diagnosis' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
            'follow_up_date' => ['nullable', 'date'],
            'follow_up_notified_at' => ['nullable', 'date'],
        ];
    }
}
