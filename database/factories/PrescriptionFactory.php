<?php

namespace Database\Factories;

use App\Models\ConsultationRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $medicines = [
            ['name' => 'Amoxicillin', 'dosage' => '500mg', 'quantity' => 20],
            ['name' => 'Ibuprofen', 'dosage' => '200mg', 'quantity' => 30],
            ['name' => 'Metformin', 'dosage' => '500mg', 'quantity' => 60],
            ['name' => 'Lisinopril', 'dosage' => '10mg', 'quantity' => 30],
            ['name' => 'Omeprazole', 'dosage' => '20mg', 'quantity' => 30],
            ['name' => 'Cetirizine', 'dosage' => '10mg', 'quantity' => 10],
            ['name' => 'Diphenhydramine', 'dosage' => '25mg', 'quantity' => 20],
            ['name' => 'Atorvastatin', 'dosage' => '20mg', 'quantity' => 30],
        ];

        $medicine = $this->faker->randomElement($medicines);
        $medicineDetails = [
            'name' => $medicine['name'],
            'dosage' => $medicine['dosage'],
            'quantity' => $medicine['quantity'],
            'frequency' => $this->faker->randomElement(['Once daily', 'Twice daily', 'Three times daily', 'Every 6 hours']),
        ];

        $instructions = [
            'Take with food',
            'Take on an empty stomach',
            'Take with a full glass of water',
            'Avoid dairy products',
            'May cause drowsiness',
            'Do not exceed recommended dose',
        ];

        return [
            'consultation_record_id' => ConsultationRecord::factory(),
            'medicine_details' => $medicineDetails,
            'instructions' => $this->faker->sentence() . '. ' . $this->faker->randomElement($instructions),
        ];
    }
}
