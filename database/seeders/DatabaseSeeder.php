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
        // User::factory(10)->create();
        Teachers::factory(100)->create();
        Classes::factory(200)->create();
        Student::factory(10000)->create();
        Subjects::factory(200)->create();
        ClassSubject::factory(200)->create();
        Grades::factory(500)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
