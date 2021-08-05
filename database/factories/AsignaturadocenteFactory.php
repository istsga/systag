<?php

namespace Database\Factories;

use App\Models\Asignacione;
use App\Models\Asignatura;
use App\Models\Asignaturadocente;
use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignaturadocenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asignaturadocente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'asignacione_id'       => Asignacione::factory(),
            'asignatura_id'        => Asignatura::factory(),
            'docente_id'           => Docente::factory(),
        ];
    }
}
