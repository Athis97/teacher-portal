<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = Teacher::factory()->create();
    }

    /** @test */
    public function it_can_store_a_student()
    {
        $this->actingAs($this->user);

        $data = [
            'name' => 'John Doe',
            'subject' => 'Mathematics',
            'marks' => 85,
        ];

        $response = $this->post(route('students.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('students', [
            'name' => 'John Doe',
            'subject' => 'Mathematics',
            'marks' => 85,
            'teacher_id' => $this->user->id,
        ]);
    }

    /** @test */
    public function it_can_update_a_student()
    {
        $this->actingAs($this->user);

        $student = Student::factory()->create([
            'name' => 'John Doe',
            'subject' => 'Mathematics',
            'marks' => 75,
            'teacher_id' => $this->user->id,
        ]);

        $data = [
            'name' => 'John Doe',
            'subject' => 'Mathematics',
            'marks' => 90,
        ];

        $response = $this->put(route('students.update', $student), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => 'John Doe',
            'subject' => 'Mathematics',
            'marks' => 90,
        ]);
    }

    /** @test */
    public function it_can_destroy_a_student()
    {
        $this->actingAs($this->user);

        $student = Student::factory()->create([
            'name' => 'John Doe',
            'subject' => 'Mathematics',
            'marks' => 75,
            'teacher_id' => $this->user->id,
        ]);

        $response = $this->delete(route('students.destroy', $student));

        $response->assertRedirect();
        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
        ]);
    }
}

