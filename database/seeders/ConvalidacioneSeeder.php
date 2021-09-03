<?php

namespace Database\Seeders;

use App\Models\Convalidacione;
use Illuminate\Database\Seeder;

class ConvalidacioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Convalidacione::create([
            'estudiante_id'            => '1',
            'asignatura_id'            => '4',
            'nota_final'                => '8',
        ]);

        Convalidacione::create([
            'estudiante_id'            => '1',
            'asignatura_id'            => '5',
            'nota_final'                => '8',
        ]);


        Convalidacione::create([
            'estudiante_id'            => '2',
            'asignatura_id'            => '4',
            'nota_final'                => '8',
        ]);

        Convalidacione::create([
            'estudiante_id'            => '2',
            'asignatura_id'            => '5',
            'nota_final'                => '8',
        ]);

        Convalidacione::create([
            'estudiante_id'            => '2',
            'asignatura_id'            => '6',
            'nota_final'                => '8',
        ]);

        Convalidacione::create([
            'estudiante_id'            => '3',
            'asignatura_id'            => '4',
            'nota_final'                => '8',
        ]);

        Convalidacione::create([
            'estudiante_id'            => '4',
            'asignatura_id'            => '5',
            'nota_final'                => '8',
        ]);

        Convalidacione::create([
            'estudiante_id'            => '1',
            'asignatura_id'            => '6',
            'nota_final'                => '8',
        ]);

        //SEGUNDO PERIODO
        Convalidacione::create([
            'estudiante_id'            => '1',
            'asignatura_id'            => '7',
            'nota_final'                => '9',
        ]);

        Convalidacione::create([
            'estudiante_id'            => '1',
            'asignatura_id'            => '8',
            'nota_final'                => '9',
        ]);

        Convalidacione::create([
            'estudiante_id'            => '2',
            'asignatura_id'            => '8',
            'nota_final'                => '9',
        ]);

    }
}
