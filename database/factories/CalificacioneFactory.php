<?php

namespace Database\Factories;

use App\Models\Asignacione;
use App\Models\Asignatura;
use App\Models\Calificacione;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalificacioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Calificacione::class;

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
            'docencia'                  => $this->faker->numberBetween(7,10),
            'experimento_aplicacion'    => $this->faker->numberBetween(7,10),
            'trabajo_autonomo'          => $this->faker->numberBetween(7,10),
            'suma'                      => $this->faker->numberBetween(21,30),
            'promedio_decimal'          => $this->faker->numberBetween(7,10),
            'examen_principal'          => $this->faker->numberBetween(7,10),
            'promedio_final'            => $this->faker->numberBetween(7,10),
            'promedio_letra'            => $this->faker->text(10),
            'numero_asistencia'         => $this->faker->numberBetween(60,100),
            'porcentaje_asistencia'     => $this->faker->numberBetween(60,100),
            'observacion'               => $this->faker->text(15),
        ];
    }
}
