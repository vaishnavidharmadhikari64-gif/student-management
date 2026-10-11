<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['name' => 'Computer Science',         'description' => 'Programming, algorithms and software engineering.'],
            ['name' => 'Information Technology',   'description' => 'Networks, databases and systems administration.'],
            ['name' => 'Business Administration',  'description' => 'Management, finance and marketing basics.'],
            ['name' => 'Electronics',              'description' => 'Circuits, embedded systems and communication.'],
            ['name' => 'Mechanical Engineering',   'description' => 'Design, thermodynamics and manufacturing.'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }

        Student::factory()->count(30)->create();
    }
}