<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => fake()->unique()->numerify('STU-####'),
            'name' => fake()->name(),
            'course' => fake()->randomElement([
                'BSIT',
                'BSCS',
                'BSN',
                'BSED',
                'BSBA',
            ]),
            'year_level' => fake()->numberBetween(1, 5),
        ];
    }
}
