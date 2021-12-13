<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\User'                       => 'App\Policies\UserPolicy',
        'Spatie\Permission\Models\Role'         => 'App\Policies\RolePolicy',
        'Spatie\Permission\Models\Permission'   =>   'App\Policies\PermisoPolicy',
        'App\Models\Carrera'                    => 'App\Policies\CarreraPolicy',
        'App\Models\Periodo'                    => 'App\Policies\PeriodoPolicy',
        'App\Models\Seccione'                   => 'App\Policies\SeccionePolicy',
        'App\Models\Paralelo'                   => 'App\Policies\ParaleloPolicy',
        'App\Models\Asignatura'                 => 'App\Policies\AsignaturaPolicy',
        'App\Models\Periodacademico'            => 'App\Policies\PeriodacademicoPolicy',
        'App\Models\Asignacione'                => 'App\Policies\AsignacionePolicy',
        'App\Models\Estudiante'                 => 'App\Policies\EstudiantePolicy',
        'App\Models\Docente'                    => 'App\Policies\DocentePolicy',
        'App\Models\Convalidacione'             => 'App\Policies\ConvalidacionePolicy',
        'App\Models\Matricula'                  => 'App\Policies\MatriculaPolicy',
        'App\Models\Horario'                    => 'App\Policies\HorarioPolicy',
        'App\Models\Asignaturadocente'          => 'App\Policies\AsignaturadocentePolicy',
        'App\Models\Calificacione'              => 'App\Policies\CalificacionePolicy',
        'App\Models\Suspenso'                   => 'App\Policies\SuspensoPolicy',

        //VISTAS
        'App\Models\Estudiantenomina'            => 'App\Policies\EstudiantenominaPolicy',
        'App\Models\Horarioclase'                => 'App\Policies\HorarioclasePolicy',

        //REPORTES
        'App\Models\Egresado'                   => 'App\Policies\EgresadoPolicy',
        'App\Models\Recordacademico'            => 'App\Policies\RecordacademicoPolicy',
        'App\Models\Calificacionperiodo'        => 'App\Policies\CalificacionperiodoPolicy',
        'App\Models\Certificadoperiodo'         => 'App\Policies\CertificadoperiodoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
