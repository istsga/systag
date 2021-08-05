<?php

namespace Database\Factories;

use App\Models\Asignacione;
use App\Models\Asignatura;
use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Horario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'asignacione_id'    =>  Asignacione::factory(),
            'asignatura_id'     =>  Asignatura::factory(),
            'dia_semana'        =>  rand(1,5),
            'hora_inicio'       =>  $this->faker->time,
            'hora_final'        =>  $this->faker->time,
            'cantidad_hora'     =>  $this->faker->randomDigit,
            'fecha_inicio'      =>  $this->faker->date,
            'fecha_final'       =>  $this->faker->date,
            'fecha_examen'      =>  $this->faker->date,
            'fecha_suspension'  =>  $this->faker->date,
            'orden'             =>  rand(1,3)
        ];
    }
}
