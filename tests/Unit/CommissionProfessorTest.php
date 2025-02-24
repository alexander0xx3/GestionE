<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Commission;
use App\Models\Professor;
use App\Models\Course;

class CommissionProfessorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_asignar_profesores_a_una_comision()
    {
        $course = Course::factory()->create();
        $commission = Commission::factory()->create(['course_id' => $course->id]);
        $professor = Professor::factory()->create();

        $commission->professors()->attach($professor->id);

        $this->assertDatabaseHas('commission_professor', [
            'commission_id' => $commission->id,
            'professor_id' => $professor->id,
        ]);
    }
}
