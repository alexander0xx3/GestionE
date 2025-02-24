<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_puede_registrarse()
    {
        $response = $this->post('/register', [
            'name' => 'Nuevo Usuario',
            'email' => 'usuario@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'usuario@example.com',
        ]);
    }

    /** @test */
    public function un_usuario_puede_iniciar_sesion()
    {
        $user = User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'juan@example.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);
    }
}
