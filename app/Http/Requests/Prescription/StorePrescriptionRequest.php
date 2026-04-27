<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePrescriptionRequest extends FormRequest
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
            'medicine_details' => 'nullable|array',
            'medicine_details.*.medication_name' => 'required_with:medicine_details|string',
            'medicine_details.*.dosage' => 'required_with:medicine_details|string',
            'medicine_details.*.frequency' => 'required_with:medicine_details|string',
            'medicine_details.*.duration_days' => 'required_with:medicine_details|integer',
            'instructions' => 'nullable|string'
        ];
    }
}
