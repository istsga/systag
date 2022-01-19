<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $this->call([
            PermissionSeeder::class,
            UserSeeder::class,
            //CarreraSeeder::class,
            //PeriodacademicoSeeder::class,
            //PeriodoSeeder::class,
            //ParaleloSeeder::class,
            //SeccioneSeeder::class,
            //AsignaturaSeeder::class,
            //PrerequisitoSeeder::class,
            //AsignacioneSeeder::class,
            EstadocivileSeeder::class,
            EtniaSeeder::class,
            InstruccioneSeeder::class,
            TiposangreSeeder::class,
            ProvinciaSeeder::class,
            CantoneSeeder::class,
            //EstudianteSeeder::class,
            TipocontratoSeeder::class,
            //DocenteSeeder::class,
            //ConvalidacioneSeeder::class,
            //MatriculaSeeder::class,
            //AsignaturadocenteSeeder::class,
            //HorarioSeeder::class,
            //CalificacioneSeeder::class,
            //SuspensoSeeder::class,
        ]);
    }
}
