<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class CommissionTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function commissions_table_exists()
    {
        $this->assertTrue(Schema::hasTable('commissions'));
    }

    /** @test */
    public function commissions_table_has_expected_columns()
    {
        $this->assertTrue(Schema::hasColumns('commissions', [
            'id', 'aula', 'horario', 'course_id', 'professor_id', 'created_at', 'updated_at'
        ]));
    }
}
