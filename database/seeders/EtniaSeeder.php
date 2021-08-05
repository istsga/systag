<?php

namespace Database\Seeders;

use App\Models\Etnia;
use Illuminate\Database\Seeder;

class EtniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etnia::create(['nombre' => 'Indígena']);
        Etnia::create(['nombre' => 'Afroecuatoriano']);
        Etnia::create(['nombre' => 'Negro']);
        Etnia::create(['nombre' => 'Mulato']);
        Etnia::create(['nombre' => 'Montuvio']);
        Etnia::create(['nombre' => 'Mestizo']);
        Etnia::create(['nombre' => 'Blanco']);
        Etnia::create(['nombre' => 'Otro']);
        Etnia::create(['nombre' => 'No registra']);
    }
}
