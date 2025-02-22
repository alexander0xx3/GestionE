<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Importa el modelo User
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SubjectsTableSeeder::class,
            CoursesTableSeeder::class,
            StudentsTableSeeder::class,
            Course_studentSeeder::class,
            ProfessorsTableSeeder::class,
            CommissionsTableSeeder::class,
        ]);

        // Crear usuario administrador
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'), // Encripta la contraseña
            'is_admin' => true, // Asegúrate de que esta columna existe en tu tabla 'users'
        ]);
    }
}
