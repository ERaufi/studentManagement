<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\ClassSubject;
use App\Models\Grades;
use App\Models\Student;
use App\Models\Subjects;
use App\Models\Teachers;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Teachers::factory(10)->create();
        Classes::factory(20)->create();
        Student::factory(60)->create();
        Subjects::factory(10)->create();
        ClassSubject::factory(30)->create();
        Grades::factory(60)->create();
        $this->call([
            CountryAndCitySeeder::class,
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
