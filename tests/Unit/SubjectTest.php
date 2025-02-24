<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Subject;

class SubjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_una_materia()
    {
        $subject = Subject::create([
            'name' => 'Ciencias Naturales',
        ]);

        $this->assertDatabaseHas('subjects', [
            'name' => 'Ciencias Naturales',
        ]);
    }
}
