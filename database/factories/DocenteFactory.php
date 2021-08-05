<?php

namespace Database\Factories;

use App\Models\Cantone;
use App\Models\Docente;
use App\Models\Provincia;
use App\Models\Tipocontrato;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Docente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo_identificacion'   =>  $this->faker->boolean(1,0),
            'dni'                   =>  $this->faker->unique()->isbn10,
            'nombre'                =>  $this->faker->name,
            'apellido'              =>  $this->faker->lastName,
            'email'                 =>  $this->faker->unique()->email(30),
            'titulo_academico'      =>  $this->faker->text(15),
            'abreviatura'           =>  $this->faker->text(6),
            'fecha_ingreso'         =>  $this->faker->date(),
            'telefono_fijo'         =>  $this->faker->ean8,
            'telefono_movil'        =>  $this->faker->isbn10,
            'provincia_id'          =>  Provincia::factory(),
            'cantone_id'            =>  Cantone::factory(),
            'calle'                 =>  $this->faker->address,
            'estado'                =>  $this->faker->boolean(1,0),
            'tipocontrato_id'       =>  Tipocontrato::factory(),
        ];
    }
}
