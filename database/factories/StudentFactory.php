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
            'name' => $this->faker->name,
            'subject' => $this->faker->randomElement([
                'Mathematics',
                'Science',
                'English',
                'History',
                'Geography',
                'Physics',
                'Chemistry',
                'Biology',
                'Computer Science',
                'Physical Education'
            ]),
            'marks' => $this->faker->numberBetween(0, 100),
            'teacher_id' => 1
        ];
    }
}
