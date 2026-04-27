<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ConsultationRecord>
 */
class ConsultationRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $diagnoses = [
            'Hypertension',
            'Type 2 Diabetes',
            'Common Cold',
            'Migraine',
            'Anxiety Disorder',
            'Asthma',
            'Gastroenteritis',
            'Urinary Tract Infection',
            'Bronchitis',
            'Back Pain',
        ];

        $followUpDate = null;
        if ($this->faker->boolean(60)) {
            $followUpDate = $this->faker->dateTimeBetween('+1 weeks', '+4 weeks')->format('Y-m-d');
        }

        return [
            'appointment_id' => Appointment::factory(),
            'user_id' => User::factory(),
            'patient_id' => Patient::factory(),
            'diagnosis' => $this->faker->randomElement($diagnoses),
            'notes' => $this->faker->sentence(),
            'follow_up_date' => $followUpDate,
            'follow_up_notified_at' => null,
        ];
    }
}
