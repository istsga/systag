<?php

namespace Database\Seeders;

use App\Models\Tiposangre;
use Illuminate\Database\Seeder;

class TiposangreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tiposangre::create(['nombre' => 'A+']);
        Tiposangre::create(['nombre' => 'A-']);
        Tiposangre::create(['nombre' => 'B+']);
        Tiposangre::create(['nombre' => 'B-']);
        Tiposangre::create(['nombre' => 'AB+']);
        Tiposangre::create(['nombre' => 'AB-']);
        Tiposangre::create(['nombre' => 'O+']);
        Tiposangre::create(['nombre' => 'O-']);
    }
}
