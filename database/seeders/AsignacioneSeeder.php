<?php

namespace Database\Seeders;

use App\Models\Asignacione;
use Illuminate\Database\Seeder;

class AsignacioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Desarrollo Sofware
        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '1';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('2');
        $asignacione->carreras()->attach('1');

        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '2';
        $asignacione->seccione_id   = '2';
        $asignacione->paralelo_id   = '2';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('2');
        $asignacione->carreras()->attach('1');

        //contabilidad
        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '1';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('2');
        $asignacione->carreras()->attach('2');

        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '1';
        $asignacione->seccione_id   = '2';
        $asignacione->paralelo_id   = '2';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('2');
        $asignacione->carreras()->attach('2');

        //enfermería
        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '1';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('2');
        $asignacione->carreras()->attach('3');

    //Odontología
        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '1';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('2');
        $asignacione->carreras()->attach('4');

        //SEGUNDO PERIODO
        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '1';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('3');
        $asignacione->carreras()->attach('1');

        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '3';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('3');
        $asignacione->carreras()->attach('1');

        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '2';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('3');
        $asignacione->carreras()->attach('1');

        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '2';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('3');
        $asignacione->carreras()->attach('2');

        //RECORD ACADEMICO
        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '3';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('4');
        $asignacione->carreras()->attach('1');

        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '4';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('5');
        $asignacione->carreras()->attach('1');

        $asignacione = new Asignacione;
        $asignacione->periodo_id    = '5';
        $asignacione->seccione_id   = '1';
        $asignacione->paralelo_id   = '1';
        $asignacione->save();
        $asignacione->periodacademicos()->attach('6');
        $asignacione->carreras()->attach('1');


    }
}
