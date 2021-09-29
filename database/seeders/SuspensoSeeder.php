<?php

namespace Database\Seeders;

use App\Models\Suspenso;
use Illuminate\Database\Seeder;

class SuspensoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ESTUDIANTES SUSPENSO APROBADO
        Suspenso::create([
            'asignacione_id'    => '1',
            'asignatura_id'     => '2',
            'estudiante_id'     => '1',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '9',
            'suma'              => '14',
            'promedio_numero'   =>  '7',
            'promedio_letra'    =>  'SIETE',
            'observacion'       =>   'APROBADO',
        ]);

        Suspenso::create([
            'asignacione_id'    => '1',
            'asignatura_id'     => '3',
            'estudiante_id'     => '1',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '7',
            'suma'              => '12',
            'promedio_numero'   =>  '6',
            'promedio_letra'    =>  'SEIS',
            'observacion'       =>   'REPROBADO',
        ]);

        Suspenso::create([
            'asignacione_id'    => '1',
            'asignatura_id'     => '4',
            'estudiante_id'     => '4',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '9',
            'suma'              => '14',
            'promedio_numero'   =>  '7',
            'promedio_letra'    =>  'SIETE',
            'observacion'       =>   'APROBADO',
        ]);

        Suspenso::create([
            'asignacione_id'    => '1',
            'asignatura_id'     => '5',
            'estudiante_id'     => '5',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '9',
            'suma'              => '14',
            'promedio_numero'   =>  '7',
            'promedio_letra'    =>  'SIETE',
            'observacion'       =>   'APROBADO',
        ]);

        Suspenso::create([
            'asignacione_id'    => '1',
            'asignatura_id'     => '5',
            'estudiante_id'     => '3',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '9',
            'suma'              => '14',
            'promedio_numero'   =>  '7',
            'promedio_letra'    =>  'SIETE',
            'observacion'       =>   'APROBADO',
        ]);

        Suspenso::create([
            'asignacione_id'    => '1',
            'asignatura_id'     => '5',
            'estudiante_id'     => '7',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '9',
            'suma'              => '14',
            'promedio_numero'   =>  '7',
            'promedio_letra'    =>  'SIETE',
            'observacion'       =>   'APROBADO',
        ]);
        Suspenso::create([
            'asignacione_id'    => '1',
            'asignatura_id'     => '5',
            'estudiante_id'     => '8',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '9',
            'suma'              => '14',
            'promedio_numero'   =>  '7',
            'promedio_letra'    =>  'SIETE',
            'observacion'       =>   'APROBADO',
        ]);

    //ESTUDIANTES SUSPENSO REPROBADO
        Suspenso::create([
            'asignacione_id'    => '3',
            'asignatura_id'     => '33',
            'estudiante_id'     => '9',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '6',
            'suma'              => '11',
            'promedio_numero'   =>  '5',
            'promedio_letra'    =>  'CINCO',
            'observacion'       =>   'REPROBADO',
        ]);
        Suspenso::create([
            'asignacione_id'    => '3',
            'asignatura_id'     => '31',
            'estudiante_id'     => '10',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '6',
            'suma'              => '11',
            'promedio_numero'   =>  '6',
            'promedio_letra'    =>  'SEIS',
            'observacion'       =>   'REPROBADO',
        ]);
        Suspenso::create([
            'asignacione_id'    => '3',
            'asignatura_id'     => '31',
            'estudiante_id'     => '11',
            'promedio_final'    =>  '5',
            'examen_suspenso'   => '6',
            'suma'              => '11',
            'promedio_numero'   =>  '5',
            'promedio_letra'    =>  'CINCO',
            'observacion'       =>   'REPROBADO',
        ]);
    }
}
