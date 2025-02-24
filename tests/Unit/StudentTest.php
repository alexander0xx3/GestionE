<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Student;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_estudiante()
    {
        $student = Student::create([
            'name' => 'María López',
            'email' => 'maria@example.com',
        ]);

        $this->assertDatabaseHas('students', [
            'name' => 'María López',
            'email' => 'maria@example.com',
        ]);
    }
}
