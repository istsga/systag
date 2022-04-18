<?php

namespace Database\Seeders;

use App\Models\Tipocontrato;
use Illuminate\Database\Seeder;

class TipocontratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipocontrato::create([ 'nombre' => 'CONTRATOS EVENTUALES']);
        Tipocontrato::create([ 'nombre' =>  'CONTRATOS INDEFINIDOS']);
        Tipocontrato::create([ 'nombre' =>  'CONTRATO DE PRESTACION DE SERVICIOS PROFESIONALES']);

    }
}
