<?php

namespace Database\Factories;

use App\Models\Cantone;
use App\Models\Provincia;
use Illuminate\Database\Eloquent\Factories\Factory;

class CantoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cantone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'provincia_id' => Provincia::factory(),
            'canton'=>$this->faker->text(15),
        ];
    }
}
