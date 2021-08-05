<?php

namespace Database\Factories;

use App\Models\Asignatura;
use App\Models\Convalidacione;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConvalidacioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Convalidacione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estudiante_id'  => Estudiante::factory(),
            'asignatura_id'  => Asignatura::factory(),
            'nota_final'     =>$this->faker->numberBetween($min = 7, $max = 10),
        ];
    }
}
