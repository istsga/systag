<?php

namespace Database\Factories;

use App\Models\Asignacione;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Seccione;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignacioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asignacione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'periodo_id'         => Periodo::factory(),
            'seccione_id'        => Seccione::factory(),
            'paralelo_id'        => Paralelo::factory(),
        ];
    }
}
