<?php

namespace Database\Seeders;

use App\Models\Prerequisito;
use Illuminate\Database\Seeder;

class PrerequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DESARROLLO SOFTWARE II
        Prerequisito::create([
            'asignatura_id'     => '7',
            'preasignatura_id'  => '1',
        ]);

        Prerequisito::create([
            'asignatura_id'     => '8',
            'preasignatura_id'  => '6',
        ]);
        Prerequisito::create([
            'asignatura_id'     => '8',
            'preasignatura_id'  => '4',
        ]);

        Prerequisito::create([
            'asignatura_id'     => '9',
            'preasignatura_id'  => '4',
        ]);

        Prerequisito::create([
            'asignatura_id'     => '10',
            'preasignatura_id'  => '4',
        ]);
        Prerequisito::create([
            'asignatura_id'     => '11',
            'preasignatura_id'  => '4',
        ]);
        Prerequisito::create([
            'asignatura_id'     => '12',
            'preasignatura_id'  => '5',
        ]);
        Prerequisito::create([
            'asignatura_id'     => '12',
            'preasignatura_id'  => '6',
        ]);

        //DESARROLLO SOFTWARE III
        Prerequisito::create([
            'asignatura_id'     => '13',
            'preasignatura_id'  => '11',
        ]);
        Prerequisito::create([
            'asignatura_id'     => '15',
            'preasignatura_id'  => '11',
        ]);

        //DESARROLLO SOFTWARE V
        Prerequisito::create([
            'asignatura_id'     => '30',
            'preasignatura_id'  => '24',
        ]);

    }
}
