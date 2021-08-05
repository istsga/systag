<?php

namespace Database\Factories;

use App\Models\Tipocontrato;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipocontratoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tipocontrato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->unique()->text(25),
        ];
    }
}
