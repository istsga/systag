<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::create([
            'nombre'            => 'I Periodo'
        ]);

        Periodo::create([
            'nombre'            => 'II Periodo'
        ]);

        Periodo::create([
            'nombre'            => 'III Periodo'
        ]);

        Periodo::create([
            'nombre'            => 'IV Periodo'
        ]);

        Periodo::create([
            'nombre'            => 'V Periodo'
        ]);
    }
}
