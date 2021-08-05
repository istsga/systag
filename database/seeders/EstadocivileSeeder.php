<?php

namespace Database\Seeders;

use App\Models\Estadocivile;
use Illuminate\Database\Seeder;

class EstadocivileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estadocivile::create(['nombre' => 'Soltero']);
        Estadocivile::create(['nombre' => 'Casado']);
        Estadocivile::create(['nombre' => 'Divorciado']);
        Estadocivile::create(['nombre' => 'Viudo']);


    }
}
