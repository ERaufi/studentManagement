<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassSubject>
 */
class ClassSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_id' => Classes::inRandomOrder()->first()->id ?? Classes::factory(),
            'subject_id' => Subjects::inRandomOrder()->first()->id ?? Subjects::factory(),
        ];
    }
}
