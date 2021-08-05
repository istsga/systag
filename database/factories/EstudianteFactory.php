<?php

namespace Database\Factories;

use App\Models\Cantone;
use App\Models\Estadocivile;
use App\Models\Estudiante;
use App\Models\Etnia;
use App\Models\Instruccione;
use App\Models\Provincia;
use App\Models\Tiposangre;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'tipo_identificacion'           => $this->faker->boolean(1,0),
        'dni'                           => $this->faker->unique()->isbn10,
        'nombre'                        => $this->faker->name,
        'apellido'                      => $this->faker->lastName,
        'foto'                          => $this->faker->imageUrl($width = 1200, $height = 400),
        'estadocivile_id'               => Estadocivile::factory(),
        'fecha_nacimiento'              => $this->faker->date(),
        'nacionalidad'                  => $this->faker->state,
        'ocupacion'                     => $this->faker->text(20),
        'discapacidad'                  => $this->faker->boolean(1,0),
        'tipo_discapacidad'             => $this->faker->text(10),
        'porcentaje_discapacidad'       => rand(1,100),
        'provincia_id'                  => Provincia::factory(),
        'cantone_id'                    => Cantone::factory(),
        'etnia_id'                      => Etnia::factory(),
        'email'                         => $this->faker->unique()->email(30),
        'tiposangre_id'                 => Tiposangre::factory(),
        'miembro_hogar'                 => $this->faker->randomDigit,
        'ingreso_ec'                    => $this->faker->numberBetween($min = 100, $max = 1600),
        'direccion_provincia_id'        => Provincia::factory(),
        'direccion_cantone_id'          => Cantone::factory(),
        'calle'                         => $this->faker->address,
        'telefono_fijo'                 => $this->faker->ean8,
        'telefono_movil'                => $this->faker->isbn10,
        'telefono_parentesco'           => $this->faker->isbn10,
        'nombre_parentesco'             => $this->faker->name,
        'parentesco'                    => $this->faker->text(10),
        'institucion_origen'            => $this->faker->text(75),
        'titulo_bachillerato'           => $this->faker->text(15),
        'nombre_padre'                  => $this->faker->name,
        'ocupacion_padre'               => $this->faker->text(15),
        'instruccione_id'               => Instruccione::factory(),
        'nombre_madre'                  => $this->faker->name,
        'ocupacion_madre'               => $this->faker->text(15),
        'madre_instruccione_id'         => Instruccione::factory(),
        'estado'                        => rand(1,3),
        ];
    }
}
