<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_curso_puede_ser_creado()
    {
        $subject = Subject::factory()->create();

        $course = Course::factory()->create([
            'name' => 'Matemáticas 101',
            'subject_id' => $subject->id,
        ]);

        $this->assertDatabaseHas('courses', [
            'name' => 'Matemáticas 101',
            'subject_id' => $subject->id,
        ]);
    }

    /** @test */
    public function un_curso_puede_ser_actualizado()
    {
        $course = Course::factory()->create();

        $course->update([
            'name' => 'Matemáticas Avanzadas',
        ]);

        $this->assertDatabaseHas('courses', [
            'id' => $course->id,
            'name' => 'Matemáticas Avanzadas',
        ]);
    }

    /** @test */
    public function un_curso_puede_ser_eliminado()
    {
        $course = Course::factory()->create();

        $course->delete();

        $this->assertDatabaseMissing('courses', [
            'id' => $course->id,
        ]);
    }
}
