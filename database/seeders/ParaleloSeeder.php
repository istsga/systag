<?php

namespace Database\Seeders;

use App\Models\Paralelo;
use Illuminate\Database\Seeder;

class ParaleloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paralelo::create([
            'nombre'            => 'A'
        ]);

        Paralelo::create([
            'nombre'            => 'B'
        ]);

        Paralelo::create([
            'nombre'            => 'C'
        ]);
    }
}
