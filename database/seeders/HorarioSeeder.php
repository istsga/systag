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
            'asignacione_id' => '13',
            'asignatura_id'  => '26',
            'fecha_inicio'   => '2022-08-17',
            'fecha_examen'   => '2022-08-19',
            'fecha_suspension'  => '2022-08-22',
            'fecha_final'     => '2022-08-25',
            'orden'           => '1',
        ]);

        Horario::create([
            'asignacione_id' => '13',
            'asignatura_id'  => '27',
            'fecha_inicio'   => '2022-08-17',
            'fecha_examen'   => '2022-08-19',
            'fecha_suspension'  => '2022-08-28',
            'fecha_final'     => '2022-08-30',
            'orden'           => '1',
        ]);

    }
}
