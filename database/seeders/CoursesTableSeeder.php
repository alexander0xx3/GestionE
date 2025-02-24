<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder
{
public function run()
{
    /*
DB::table('courses')->insert([
['name' => 'Physics 101', 'subject_id' => 2],
['name' => 'Chemistry 101', 'subject_id' => 3],
]);
}*/

    $faker = Faker::create();
    // Supongamos que ya tienes materias en la tabla `subjects`
    $subjectIds = DB::table('subjects')->pluck('id');
            foreach (range(1, 20) as $index) { // Genera 20 cursos
                DB::table('courses')->insert([
                    'name' => 'Matemáticas', // NO 'nombre'
                    'descripcion' => 'Curso básico de matemáticas',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                
            }
        }


}
