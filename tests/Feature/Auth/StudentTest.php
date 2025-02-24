<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_estudiante_puede_ser_creado()
    {
        $student = Student::factory()->create([
            'name' => 'Carlos Gómez',
        ]);

        $this->assertDatabaseHas('students', [
            'name' => 'Carlos Gómez',
        ]);
    }

    /** @test */
    public function un_estudiante_puede_actualizar_sus_datos()
    {
        $student = Student::factory()->create();

        $student->update([
            'name' => 'Juan Pérez',
        ]);

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => 'Juan Pérez',
        ]);
    }

    /** @test */
    public function un_estudiante_puede_ser_eliminado()
    {
        $student = Student::factory()->create();

        $student->delete();

        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
        ]);
    }
}
