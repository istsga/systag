<?php

namespace Database\Factories;

use App\Models\Seccione;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeccioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seccione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'  => $this->faker->unique()->text(6),
        ];
    }
}
