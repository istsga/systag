<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::create([
            // 'dia_semana'    => 'Lunes',
            // 'hora_inicio'   => '8:00',
            // 'hora_final'    => '8:00',
            //'cantidad_hora' => '1',
            'asignacione_id' => '2',
            //'asignatura_id'  => '1',
            'fecha_inicio'   => '2020-02-17',
            'fecha_examen'   => '2020-02-19',
            'fecha_suspension'  => '2020-02-22',
            'fecha_final'     => '2020-02-25',
            'orden'           => '1',
        ]);

        Horario::create([
            // 'dia_semana'    => 'Lunes',
            // 'hora_inicio'   => '8:00',
            // 'hora_final'    => '8:00',
            //'cantidad_hora' => '1',
            'asignacione_id' => '2',
            //'asignatura_id'  => '2',
            'fecha_inicio'   => '2020-02-17',
            'fecha_examen'   => '2020-02-19',
            'fecha_suspension'  => '2020-02-22',
            'fecha_final'     => '2020-02-25',
            'orden'           => '1',
        ]);

        Horario::create([
            // 'dia_semana'    => 'Lunes',
            // 'hora_inicio'   => '8:00',
            // 'hora_final'    => '8:00',
            //'cantidad_hora' => '1',
            'asignacione_id' => '1',
            //'asignatura_id'  => '3',
            'fecha_inicio'   => '2020-02-17',
            'fecha_examen'   => '2020-02-19',
            'fecha_suspension'  => '2020-02-22',
            'fecha_final'     => '2020-02-25',
            'orden'           => '1',
        ]);

        Horario::create([
            // 'dia_semana'    => 'Lunes',
            // 'hora_inicio'   => '8:00',
            // 'hora_final'    => '8:00',
            //'cantidad_hora' => '1',
            'asignacione_id' => '2',
            //'asignatura_id'  => '4',
            'fecha_inicio'   => '2020-02-17',
            'fecha_examen'   => '2020-02-19',
            'fecha_suspension'  => '2020-02-22',
            'fecha_final'     => '2020-02-25',
            'orden'           => '1',
        ]);

        Horario::create([
            // 'dia_semana'    => 'Lunes',
            // 'hora_inicio'   => '8:00',
            // 'hora_final'    => '8:00',
            //'cantidad_hora' => '1',
            'asignacione_id' => '2',
            //'asignatura_id'  => '5',
            'fecha_inicio'   => '2020-02-17',
            'fecha_examen'   => '2020-02-19',
            'fecha_suspension'  => '2020-02-22',
            'fecha_final'     => '2020-02-25',
            'orden'           => '1',
        ]);

        Horario::create([
            // 'dia_semana'    => 'Lunes',
            // 'hora_inicio'   => '8:00',
            // 'hora_final'    => '8:00',
            //'cantidad_hora' => '1',
            'asignacione_id' => '2',
            //'asignatura_id'  => '6',
            'fecha_inicio'   => '2020-02-17',
            'fecha_examen'   => '2020-02-19',
            'fecha_suspension'  => '2020-02-22',
            'fecha_final'     => '2020-02-25',
            'orden'           => '1',
        ]);


        //ASIGNACIONE 2
        Horario::create([
            // 'dia_semana'    => 'Lunes',
            // 'hora_inicio'   => '8:00',
            // 'hora_final'    => '8:00',
            //'cantidad_hora' => '1',
            'asignacione_id' => '3',
            //'asignatura_id'  => '7',
            'fecha_inicio'   => '2020-02-17',
            'fecha_examen'   => '2020-02-19',
            'fecha_suspension'  => '2020-02-22',
            'fecha_final'     => '2020-02-25',
            'orden'           => '1',
        ]);

        Horario::create([
            // 'dia_semana'    => 'Lunes',
            // 'hora_inicio'   => '8:00',
            // 'hora_final'    => '8:00',
            //'cantidad_hora' => '1',
            'asignacione_id' => '3',
            //'asignatura_id'  => '1',
            'fecha_inicio'   => '2020-02-17',
            'fecha_examen'   => '2020-02-19',
            'fecha_suspension'  => '2020-02-22',
            'fecha_final'     => '2020-02-25',
            'orden'           => '1',
        ]);

        Horario::create([
            // 'dia_semana'    => 'Lunes',
            // 'hora_inicio'   => '8:00',
            // 'hora_final'    => '8:00',
            //'cantidad_hora' => '1',
            'asignacione_id' => '3',
            //'asignatura_id'  => '8',
            'fecha_inicio'   => '2020-02-17',
            'fecha_examen'   => '2020-02-19',
            'fecha_suspension'  => '2020-02-22',
            'fecha_final'     => '2020-02-25',
            'orden'           => '1',
        ]);
    }
}
