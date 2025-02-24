<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Course;
use App\Models\Student;

class CourseStudentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_asignar_estudiantes_a_un_curso()
    {
        $course = Course::factory()->create();
        $student = Student::factory()->create();

        $course->students()->attach($student->id);

        $this->assertDatabaseHas('course_student', [
            'course_id' => $course->id,
            'student_id' => $student->id,
        ]);
    }
}
