<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Commission;

class CommissionFactory extends Factory
{
    protected $model = Commission::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'codigo' => $this->faker->unique()->numerify('COM###'),
            'descripcion' => $this->faker->sentence(),
        ];
    }
}
