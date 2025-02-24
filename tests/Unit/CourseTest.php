<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Course;
use App\Models\Subject;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_curso()
    {
        $subject = Subject::factory()->create();

        $course = Course::create([
            'name' => 'Matemáticas Avanzadas',
            'subject_id' => $subject->id,
        ]);

        $this->assertDatabaseHas('courses', [
            'name' => 'Matemáticas Avanzadas',
            'subject_id' => $subject->id,
        ]);
    }
}
