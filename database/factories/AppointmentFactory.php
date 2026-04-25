<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['pending', 'confirmed', 'completed', 'cancelled'];
        $types = ['consultation', 'follow_up', 'emergency'];

        return [
            'patient_id' => Patient::factory(),
            'user_id' => User::factory(),
            'scheduled_date' => $this->faker->dateTimeBetween('+1 days', '+90 days')->format('Y-m-d'),
            'scheduled_time' => $this->faker->time('H:i:s'),
            'status' => $this->faker->randomElement($statuses),
            'type' => $this->faker->randomElement($types),
            'reason' => $this->faker->optional()->sentence(),
            'cancellation_reason' => $this->faker->optional()->sentence(),
        ];
    }
}
