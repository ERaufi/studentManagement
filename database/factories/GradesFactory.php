<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grades>
 */
class GradesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->id ?? Student::factory(),
            'subject_id' => Subjects::inRandomOrder()->first()->id ?? Subjects::factory(),
            'grade' => $this->faker->numberBetween(0, 100),
        ];
    }
}
