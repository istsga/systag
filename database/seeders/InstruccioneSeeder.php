<?php

namespace Database\Seeders;

use App\Models\Instruccione;
use Illuminate\Database\Seeder;

class InstruccioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instruccione::create(['nombre' => 'Primaria']);
        Instruccione::create(['nombre' => 'Secundaria']);
        Instruccione::create(['nombre' => 'Superior']);
    }
}
