<?php

namespace Database\Factories;

use App\Models\Instruccione;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstruccioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instruccione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->unique()->text(8),
        ];
    }
}
