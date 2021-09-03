<?php

namespace Database\Seeders;

use App\Models\Matricula;
use Illuminate\Database\Seeder;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matricula = new matricula;
        $matricula->estudiante_id      = '1';
        $matricula->asignacione_id     = '1';
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->tipo               = rand(1,3);
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,2,3,6]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '1';
        $matricula->estudiante_id      = '2';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,2,3 ]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '1';
        $matricula->estudiante_id      = '3';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,2,3,5,6 ]);


        $matricula = new matricula;
        $matricula->asignacione_id     = '1';
        $matricula->estudiante_id      = '4';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,2,3,4,6 ]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '1';
        $matricula->estudiante_id      = '5';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,2,3,4,5,6 ]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '1';
        $matricula->estudiante_id      = '6';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,2,3,4,5 ]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '1';
        $matricula->estudiante_id      = '7';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,2,3,4,5]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '1';
        $matricula->estudiante_id      = '8';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,2,3,4,]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '1';
        $matricula->estudiante_id      = '9';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,2,3,4,]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '1';
        $matricula->estudiante_id      = '10';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 1,3]);


        $matricula = new matricula;
        $matricula->asignacione_id     = '2';
        $matricula->estudiante_id      = '12';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '2';
        $matricula->estudiante_id      = '13';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '2';
        $matricula->estudiante_id      = '14';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '2';
        $matricula->estudiante_id      = '15';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '2';
        $matricula->estudiante_id      = '16';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '2';
        $matricula->estudiante_id      = '17';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '2';
        $matricula->estudiante_id      = '18';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '2';
        $matricula->estudiante_id      = '19';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '2';
        $matricula->estudiante_id      = '20';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 7,8,9,10,11,12]);

        //CONTABILIDAD
        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '11';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '21';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '22';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '23';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '24';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '25';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '26';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '27';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '28';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '29';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '30';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '31';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '32';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '33';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '34';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '3';
        $matricula->estudiante_id      = '35';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);


        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '36';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '37';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '38';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '39';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '40';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '41';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '42';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '43';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '44';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '45';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '46';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '4';
        $matricula->estudiante_id      = '47';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 29,30,31,32,33,34]);

        //FERMERIA B
        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '48';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '49';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '50';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '51';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '52';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '53';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '54';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '55';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '56';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '57';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '58';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '59';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '60';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '61';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '62';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '63';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '64';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '65';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '66';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '67';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '68';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '69';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '70';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '71';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '72';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '73';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '74';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '75';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '76';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '77';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '78';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '79';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '80';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '81';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '82';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '83';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '84';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '85';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '86';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '87';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '88';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '89';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '90';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '91';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '92';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '93';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '94';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '95';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '96';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '5';
        $matricula->estudiante_id      = '97';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 57,58,59,60,61,62]);

        //ODNTOLOGIA
        $matricula = new matricula;
        $matricula->asignacione_id     = '6';
        $matricula->estudiante_id      = '98';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 80,81,82,83,84,85]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '6';
        $matricula->estudiante_id      = '99';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 80,81,82,83,84,85]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '6';
        $matricula->estudiante_id      = '100';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2020-12-19';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([ 80,81,82,83,84,85]);

        //RECORD ACADEMICO
        //SEGUNDO PERIODO
        $matricula = new matricula;
        $matricula->asignacione_id     = '9';
        $matricula->estudiante_id      = '1';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-07-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '9';
        $matricula->estudiante_id      = '2';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-07-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([7,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '9';
        $matricula->estudiante_id      = '3';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-07-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '9';
        $matricula->estudiante_id      = '4';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-07-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([7,8,9,10,11,12]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '9';
        $matricula->estudiante_id      = '5';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-07-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([7,8,9,10,11,12]);

        //TERCER PERIODO
        $matricula = new matricula;
        $matricula->asignacione_id     = '11';
        $matricula->estudiante_id      = '1';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-11-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([13,14,15,16,17,18]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '11';
        $matricula->estudiante_id      = '2';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-11-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([13,14,15,16,17,18]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '11';
        $matricula->estudiante_id      = '3';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-11-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([13,14,15,16,17,18]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '11';
        $matricula->estudiante_id      = '4';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-11-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([13,14,15,16,17,18]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '11';
        $matricula->estudiante_id      = '5';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2021-11-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([13,14,15,16,17,18]);

    //CUARTO PERIODO
        $matricula = new matricula;
        $matricula->asignacione_id     = '12';
        $matricula->estudiante_id      = '1';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-03-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([19,20,21,22,23]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '12';
        $matricula->estudiante_id      = '2';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-03-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([19,20,21,22,23]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '12';
        $matricula->estudiante_id      = '3';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-03-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([19,20,21,22,23]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '12';
        $matricula->estudiante_id      = '4';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-03-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([19,20,21,22,23]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '12';
        $matricula->estudiante_id      = '5';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-03-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([19,20,21,22,23]);

        //QUINTO PERIODO
        $matricula = new matricula;
        $matricula->asignacione_id     = '13';
        $matricula->estudiante_id      = '1';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-08-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([24,25,26,27,28]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '13';
        $matricula->estudiante_id      = '2';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-08-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([24,25,26,27,28]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '13';
        $matricula->estudiante_id      = '3';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-08-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([24,25,26,27,28]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '13';
        $matricula->estudiante_id      = '4';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-08-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([24,25,26,27,28]);

        $matricula = new matricula;
        $matricula->asignacione_id     = '13';
        $matricula->estudiante_id      = '5';
        $matricula->tipo   = rand(1,3);
        $matricula->fecha_matricula    = '2022-08-10';
        $matricula->condicion          = '1';
        $matricula->save();
        $matricula->asignaturas()->attach([24,25,26,27,28]);




    }
}
