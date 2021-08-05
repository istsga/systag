<?php

namespace Database\Factories;

use App\Models\Periodacademico;
use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeriodacademicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Periodacademico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estado'                    => $this->faker->randomElement(['Nuevo', 'En Curso', 'Finalizado']),
            'periodo'                   =>$this->faker->unique()->bothify('##??#','-','##??#'),
            'fecha_inicio'              =>$this->faker->date('Y-m-d'),
            'fecha_final'               =>$this->faker->date('Y-m-d'),

        ];
    }
}
