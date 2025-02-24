<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Professor;

class ProfessorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_profesor()
    {
        $professor = Professor::create([
            'name' => 'Carlos Gómez',
            'specialization' => 'Física',
        ]);

        $this->assertDatabaseHas('professors', [
            'name' => 'Carlos Gómez',
            'specialization' => 'Física',
        ]);
    }
}
