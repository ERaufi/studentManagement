<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail,
            'age' => $this->faker->numberBetween(10, 25),
            'date_of_birth' => $this->faker->date('Y-m-d'),
            'gender' => $this->faker->randomElement(['m', 'f']),
        ];
    }
}
