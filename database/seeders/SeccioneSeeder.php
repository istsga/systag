<?php

namespace Database\Seeders;

use App\Models\Seccione;
use Illuminate\Database\Seeder;

class SeccioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seccione::create([
            'nombre'            => 'Diurno'
        ]);

        Seccione::create([
            'nombre'            => 'Nocturno'
        ]);
    }
}
