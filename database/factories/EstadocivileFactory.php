<?php

namespace Database\Factories;

use App\Models\Estadocivile;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstadocivileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estadocivile::class;

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
