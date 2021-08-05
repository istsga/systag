<?php

namespace Database\Factories;

use App\Models\Asignacione;
use App\Models\Asignatura;
use App\Models\Estudiante;
use App\Models\Suspenso;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuspensoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suspenso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'asignacione_id'            => Asignacione::factory(),
                'asignatura_id'             => Asignatura::factory(),
                'estudiante_id'             => Estudiante::factory(),
                'promedio_final'            => $this->faker->numberBetween(1,6),
                'examen_suspenso'           => $this->faker->numberBetween(1,10),
                'suma'                      => $this->faker->numberBetween(1,10),
                'promedio_numero'           => $this->faker->numberBetween(60,100),
                'promedio_letra'            => $this->faker->text(10),
                'observacion'               => $this->faker->text(15),
            ];
    }
}
