<?php

namespace App\Http\Requests\Patient;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'regex:/^\+?[\d\s\-\(\)]{7,20}$/',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female',
            'address' => 'required|string|max:255',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_phone' => 'regex:/^\+?[\d\s\-\(\)]{7,20}$/',
            'blood_type' => 'nullable|string|max:4',
        ];
    }
}
