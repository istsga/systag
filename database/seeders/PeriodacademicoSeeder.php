<?php

namespace Database\Seeders;

use App\Models\Periodacademico;
use Illuminate\Database\Seeder;

class PeriodacademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Periodacademico::create([
            'estado'            => '3',
            'periodo'           => 'Octubre 2019 - Marzo 2020',
            'fecha_inicio'      => '2021_09_15',
            'fecha_final'      => '2022_03_15',
        ])->carreras()->attach(['3', '4', '5']);

        Periodacademico::create([
            'estado'            => '3',
            'periodo'           => 'Enero 2021 - Junio 2021',
            'fecha_inicio'      => '2021_01_06',
            'fecha_final'      => '2021_06_30',
        ])->carreras()->attach(['1', '2', '3', '4']);

        Periodacademico::create([
            'estado'            => '3',
            'periodo'           => 'Julio 2021 - Noviembre 2021',
            'fecha_inicio'      => '2021_07_5',
            'fecha_final'      => '2022_11_20',
        ])->carreras()->attach(['1', '2', '3', '4']);

        Periodacademico::create([
            'estado'            => '3',
            'periodo'           => 'Noviembre 2021 - Marzo 2022',
            'fecha_inicio'      => '2021_03_11',
            'fecha_final'      => '2022_03_20',
        ])->carreras()->attach(['1', '2', '3', '4']);

        Periodacademico::create([
            'estado'            => '2',
            'periodo'           => 'Marzo 2022 - Agosto 2022',
            'fecha_inicio'      => '2022_03_11',
            'fecha_final'      => '2022_08_20',
        ])->carreras()->attach(['1', '2', '3', '4']);

        Periodacademico::create([
            'estado'            => '1',
            'periodo'           => 'Mayo - Octubre 2022',
            'fecha_inicio'      => '2022_05_01',
            'fecha_final'      => '2022_09_20',
        ])->carreras()->attach(['1', '2', '3', '4']);

    }
}
