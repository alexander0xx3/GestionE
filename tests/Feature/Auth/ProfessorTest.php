<?php

namespace Tests\Feature;

use App\Models\Professor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfessorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_profesor_puede_ser_creado()
    {
        $professor = Professor::factory()->create([
            'name' => 'Dr. López',
            'specialization' => 'Física',
        ]);

        $this->assertDatabaseHas('professors', [
            'name' => 'Dr. López',
            'specialization' => 'Física',
        ]);
    }

    /** @test */
    public function un_profesor_puede_actualizar_sus_datos()
    {
        $professor = Professor::factory()->create();

        $professor->update([
            'specialization' => 'Matemáticas',
        ]);

        $this->assertDatabaseHas('professors', [
            'id' => $professor->id,
            'specialization' => 'Matemáticas',
        ]);
    }

    /** @test */
    public function un_profesor_puede_ser_eliminado()
    {
        $professor = Professor::factory()->create();

        $professor->delete();

        $this->assertDatabaseMissing('professors', [
            'id' => $professor->id,
        ]);
    }
}
