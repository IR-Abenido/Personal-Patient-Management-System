<?php

namespace Database\Factories;

use App\Models\ConsultationRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VitalSign>
 */
class VitalSignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $systolic = $this->faker->numberBetween(90, 180);
        $diastolic = $this->faker->numberBetween(60, 110);

        return [
            'consultation_record_id' => ConsultationRecord::factory(),
            'blood_pressure' => "{$systolic}/{$diastolic}",
            'heart_rate' => $this->faker->numberBetween(60, 100),
            'temperature' => number_format($this->faker->randomFloat(1, 36.5, 39.5), 1),
            'weight_kg' => $this->faker->numberBetween(50, 120),
            'height_cm' => $this->faker->numberBetween(150, 200),
            'respiratory_rate' => $this->faker->numberBetween(12, 20),
            'oxygen_saturation' => $this->faker->numberBetween(95, 100),
            'notes' => $this->faker->optional(0.3)->sentence(),
        ];
    }
}
