<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrera::create([
            'codigo'            => 'DS01',
            'nombre'            => 'Tecnología en Desarrollo de Software',
            'titulo'            => 'Tecnólogo/a en Desarrollo de Software',
            'numero_periodo'    => '5',
            'condicion'         => '1',
        ]);

        Carrera::create([
            'codigo'            => 'C01',
            'nombre'            => 'Tecnología en Contabilidad',
            'titulo'            => 'Tecnólogo/a en Contabilidad',
            'numero_periodo'    => '5',
            'condicion'         => '1',
        ]);

        Carrera::create([
            'codigo'            => 'E01',
            'nombre'            => ' Técnico Enfermería',
            'titulo'            => 'Técnico/a en Enfermería',
            'numero_periodo'    => '4',
            'condicion'         => '1',
        ]);

        Carrera::create([
            'codigo'            => 'OD01',
            'nombre'            => ' Técnico Odontología',
            'titulo'            => 'Técnico/a en Odontología',
            'numero_periodo'    => '4',
            'condicion'         => '1',
        ]);

        Carrera::create([
            'codigo'            => 'AS01',
            'nombre'            => 'Tecnología en Analisis de Sistemas',
            'titulo'            => 'Tecnólogo/a en Analisis de Sistemas',
            'numero_periodo'    => '5',
            'condicion'         => '0',
        ]);

    }
}
