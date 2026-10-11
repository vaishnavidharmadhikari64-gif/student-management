<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'          => fake()->name(),
            'email'         => fake()->unique()->safeEmail(),
            'phone'         => fake()->numerify('##########'),
            'date_of_birth' => fake()->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            'gender'        => fake()->randomElement(['male', 'female', 'other']),
            'course_id'     => Course::inRandomOrder()->first()?->id ?? Course::factory(),
            'address'       => fake()->address(),
        ];
    }
}