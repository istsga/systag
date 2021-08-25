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
            'nombre'            => 'Tecnología Superior en Desarrollo de Software',
            'titulo'            => 'Tecnólogo/a Superior en Desarrollo de Software',
            'numero_periodo'    => '5',
            'logo'              =>  'default.png',
            'condicion'         => '1',
        ]);

        Carrera::create([
            'codigo'            => 'C01',
            'nombre'            => 'Tecnología Superior en Contabilidad',
            'titulo'            => 'Tecnólogo/a Superior en Contabilidad',
            'numero_periodo'    => '5',
            'logo'              =>  'default.png',
            'condicion'         => '1',
        ]);

        Carrera::create([
            'codigo'            => 'E01',
            'nombre'            => 'Técnico Superior en Enfermería',
            'titulo'            => 'Técnico/a Superior en Enfermería',
            'numero_periodo'    => '4',
            'logo'              =>  'default.png',
            'condicion'         => '1',
        ]);

        Carrera::create([
            'codigo'            => 'OD01',
            'nombre'            => 'Técnico Superior Odontología',
            'titulo'            => 'Técnico/a Superior en Odontología',
            'numero_periodo'    => '4',
            'logo'              =>  'default.png',
            'condicion'         => '1',
        ]);

        Carrera::create([
            'codigo'            => 'CC01',
            'nombre'            => 'Tecnología Superior en Cuidado Canino',
            'titulo'            => 'Tecnólogo/a Superior en Cuidado Canino',
            'numero_periodo'    => '5',
            'logo'              =>  'default.png',
            'condicion'         => '1',
        ]);

        Carrera::create([
            'codigo'            => 'EM01',
            'nombre'            => 'Tecnología Superior en Emergencias Médicas',
            'titulo'            => 'Tecnólogo/a Superior en Emergencias Médicas',
            'numero_periodo'    => '5',
            'logo'              =>  'default.png',
            'condicion'         => '1',
        ]);


        Carrera::create([
            'codigo'            => 'AS01',
            'nombre'            => 'Tecnología en Analisis de Sistemas',
            'titulo'            => 'Tecnólogo/a en Analisis de Sistemas',
            'numero_periodo'    => '5',
            'logo'              =>  'default.png',
            'condicion'         => '0',
        ]);

    }
}
