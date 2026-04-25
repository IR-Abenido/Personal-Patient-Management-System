<?php

namespace App\Http\Requests\Allergy;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientAllergyRequest extends FormRequest
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
            'allergy_name' => ['required', 'string', 'max:255'],
            'severity' => ['required', 'string', 'in:mild,moderate,severe'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
