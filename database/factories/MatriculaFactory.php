<?php

namespace Database\Factories;

use App\Models\Asignacione;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Tipomatricula;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatriculaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matricula::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'asignacione_id'        =>  Asignacione::factory(),
            'estudiante_id'         =>  Estudiante::factory(),
            'tipo'                  =>  rand(1,3),
            'fecha_matricula'       =>  $this->faker->date(),
            'condicion'             =>  $this->faker->boolean(1,0)
        ];
    }
}
