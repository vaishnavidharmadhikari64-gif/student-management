<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function test_students_page_loads(): void
    {
        $this->get(route('students.index'))->assertOk();
    }

    public function test_student_can_be_created(): void
    {
        $course = Course::factory()->create();

        $this->post(route('students.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '9999999999',
            'date_of_birth' => '2000-01-01',
            'gender' => 'male',
            'course_id' => $course->id,
        ])->assertRedirect(route('students.index'));

        $this->assertDatabaseHas('students', ['email' => 'john@example.com']);
    }

    public function test_validation_fails_for_short_name(): void
    {
        $this->post(route('students.store'), ['name' => 'Jo'])
            ->assertSessionHasErrors(['name', 'email', 'phone', 'date_of_birth', 'gender', 'course_id']);
    }

    public function test_student_can_be_deleted(): void
    {
        $student = Student::factory()->create();

        $this->delete(route('students.destroy', $student))
            ->assertRedirect(route('students.index'));

        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }

    public function test_search_filters_students(): void
    {
        $course = Course::factory()->create();
        Student::factory()->create(['name' => 'Alice Smith', 'course_id' => $course->id]);
        Student::factory()->create(['name' => 'Bob Jones', 'course_id' => $course->id]);

        $this->get(route('students.index', ['search' => 'Alice']))
            ->assertSee('Alice Smith')
            ->assertDontSee('Bob Jones');
    }
}