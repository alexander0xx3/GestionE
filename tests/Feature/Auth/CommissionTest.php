<?php

namespace Tests\Feature;

use App\Models\Commission;
use App\Models\Course;
use App\Models\Professor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function una_comision_puede_ser_creada()
    {
        $course = Course::factory()->create();
        $professor = Professor::factory()->create();

        $commission = Commission::factory()->create([
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
    public function una_comision_puede_actualizar_sus_datos()
    {
        $commission = Commission::factory()->create();

        $commission->update([
            'horario' => '10:00 - 12:00',
        ]);

        $this->assertDatabaseHas('commissions', [
            'id' => $commission->id,
            'horario' => '10:00 - 12:00',
        ]);
    }

    /** @test */
    public function una_comision_puede_ser_eliminada()
    {
        $commission = Commission::factory()->create();

        $commission->delete();

        $this->assertDatabaseMissing('commissions', [
            'id' => $commission->id,
        ]);
    }
}
