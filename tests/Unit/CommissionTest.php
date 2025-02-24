<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Commission;
use App\Models\Course;
use App\Models\Professor;

class CommissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_una_comision()
    {
        $course = Course::factory()->create();
        $professor = Professor::factory()->create();

        $commission = Commission::create([
            'aula' => 'Aula 101',
            'horario' => '08:00 - 10:00',
            'course_id' => $course->id,
            'professor_id' => $professor->id,
        ]);

        $this->assertDatabaseHas('commissions', [
            'aula' => 'Aula 101',
            'horario' => '08:00 - 10:00',
            'course_id' => $course->id,
            'professor_id' => $professor->id,
        ]);
    }

    /** @test */
    public function no_puede_crear_una_comision_sin_curso()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Commission::create([
            'aula' => 'Aula 102',
            'horario' => '10:00 - 12:00',
            'professor_id' => null, // Profesor opcional
        ]);
    }
}
