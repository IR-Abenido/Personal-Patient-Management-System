<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientAllergy>
 */
class PatientAllergyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $allergies = [
            'Peanuts',
            'Shellfish',
            'Milk',
            'Eggs',
            'Wheat',
            'Fish',
            'Soy',
            'Tree Nuts',
            'Penicillin',
            'Aspirin',
            'Latex',
            'Sulfonamides',
        ];

        return [
            'patient_id' => Patient::factory(),
            'allergy_name' => $this->faker->randomElement($allergies),
            'severity' => $this->faker->randomElement(['mild', 'moderate', 'severe']),
            'notes' => $this->faker->sentence(),
        ];
    }
}
