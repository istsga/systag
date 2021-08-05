<?php

namespace Database\Factories;

use App\Models\Carrera;
use App\Models\Periodo;
use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignaturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asignatura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'carrera_id'        =>Carrera::factory(),
            'periodo_id'        =>Periodo::factory(),
            'cod_asignatura'    =>$this->faker->unique()->bothify('##??#'),
            'nombre'            =>$this->faker->text(40),
            'cantidad_hora'     =>$this->faker->bothify('##'),
        ];
    }
}
