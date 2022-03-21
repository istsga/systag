<?php

namespace Database\Seeders;

use App\Models\Detallehorario;
use Illuminate\Database\Seeder;

class DetallehorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detallehorario::create([
            'horario_id' => '1',
            'dia_semana' => 'Lunes',
            'hora_inicio' => '08:00:00',
            'hora_final' =>  '10:00:00',
         ]);
        Detallehorario::create([
            'horario_id' => '1',
            'dia_semana' => 'Martes',
            'hora_inicio' => '08:00:00',
            'hora_final' =>  '10:00:00',
         ]);
        Detallehorario::create([
            'horario_id' => '1',
            'dia_semana' => 'Miercoles',
            'hora_inicio' => '08:00:00',
            'hora_final' =>  '10:00:00',
         ]);
        Detallehorario::create([
            'horario_id' => '1',
            'dia_semana' => 'Jueves',
            'hora_inicio' => '08:00:00',
            'hora_final' =>  '10:00:00',
         ]);
        Detallehorario::create([
            'horario_id' => '1',
            'dia_semana' => 'Viernes',
            'hora_inicio' => '08:00:00',
            'hora_final' =>  '10:00:00',
         ]);

        Detallehorario::create([
            'horario_id' => '2',
            'dia_semana' => 'Lunes',
            'hora_inicio' => '10:15:00',
            'hora_final' =>  '12:00:00',
         ]);
        Detallehorario::create([
            'horario_id' => '2',
            'dia_semana' => 'Martes',
            'hora_inicio' => '10:15:00',
            'hora_final' =>  '12:00:00',
         ]);
        Detallehorario::create([
            'horario_id' => '2',
            'dia_semana' => 'Miercoles',
            'hora_inicio' => '10:15:00',
            'hora_final' =>  '12:00:00',
         ]);
        Detallehorario::create([
            'horario_id' => '2',
            'dia_semana' => 'Jueves',
            'hora_inicio' => '10:15:00',
            'hora_final' =>  '12:00:00',
         ]);
        Detallehorario::create([
            'horario_id' => '2',
            'dia_semana' => 'Viernes',
            'hora_inicio' => '10:15:00',
            'hora_final' =>  '12:00:00',
         ]);
    }
}
