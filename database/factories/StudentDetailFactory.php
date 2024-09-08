<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 15),
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
        ];
    }
}
