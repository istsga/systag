<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Provincia::create([
            'cod_provincia'     => '01',
            'provincia'         => 'Azuay',
        ]);

        Provincia::create([
            'cod_provincia'     => '02',
            'provincia'         => 'Bolívar',
        ]);

        Provincia::create([
            'cod_provincia'     => '03',
            'provincia'         => 'Cañar',
        ]);

        Provincia::create([
            'cod_provincia'     => '04',
            'provincia'         => 'Carchi',
        ]);

        Provincia::create([
            'cod_provincia'     => '05',
            'provincia'         => 'Cotopaxi',
        ]);

        Provincia::create([
            'cod_provincia'     => '06',
            'provincia'         => 'Chimborazo',
        ]);

        Provincia::create([
            'cod_provincia'     => '07',
            'provincia'         => 'El Oro',
        ]);

        Provincia::create([
            'cod_provincia'     => '08',
            'provincia'         => 'Esmeraldas',
        ]);

        Provincia::create([
            'cod_provincia'     => '09',
            'provincia'         => 'Guayas',
        ]);

        Provincia::create([
            'cod_provincia'     => '10',
            'provincia'         => 'Imbabura',
        ]);

        Provincia::create([
            'cod_provincia'     => '11',
            'provincia'         => 'Loja',
        ]);

        Provincia::create([
            'cod_provincia'     => '12',
            'provincia'         => 'Los Ríos',
        ]);

        Provincia::create([
            'cod_provincia'     => '13',
            'provincia'         => 'Manabí',
        ]);

        Provincia::create([
            'cod_provincia'     => '14',
            'provincia'         => 'Morona Santiago',
        ]);

        Provincia::create([
            'cod_provincia'     => '15',
            'provincia'         => 'Napo',
        ]);

        Provincia::create([
            'cod_provincia'     => '16',
            'provincia'         => 'Pastaza',
        ]);

        Provincia::create([
            'cod_provincia'     => '17',
            'provincia'         => 'Pichincha',
        ]);

        Provincia::create([
            'cod_provincia'     => '18',
            'provincia'         => 'Tungurahua',
        ]);

        Provincia::create([
            'cod_provincia'     => '19',
            'provincia'         => 'Zamora Chinchipe',
        ]);

        Provincia::create([
            'cod_provincia'     => '20',
            'provincia'         => 'Galápagos',
        ]);

        Provincia::create([
            'cod_provincia'     => '21',
            'provincia'         => 'Sucumbíos',
        ]);

        Provincia::create([
            'cod_provincia'     => '22',
            'provincia'         => 'Orellana',
        ]);

        Provincia::create([
            'cod_provincia'     => '23',
            'provincia'         => 'Santo Domingo de los Tsáchilas',
        ]);

        Provincia::create([
            'cod_provincia'     => '24',
            'provincia'         => 'Santa Elena',
        ]);
    }
}
