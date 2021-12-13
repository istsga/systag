<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Usuarios
         $usuarios = Permission::create(['name'=> 'Ver usuarios' ]);
         $usuarios = Permission::create(['name'=> 'Crear usuarios' ]);
         $usuarios = Permission::create(['name'=> 'Actualizar usuarios' ]);
         $usuarios = Permission::create(['name'=> 'Eliminar usuarios' ]);

         //Roles
         $roles = Permission::create(['name'=> 'Ver roles'  ]);
         $roles = Permission::create(['name'=> 'Crear roles'  ]);
         $roles = Permission::create(['name'=> 'Actualizar roles'  ]);
         $roles = Permission::create(['name'=> 'Eliminar roles'  ]);

        //Permisos
        $permisos =   Permission::create(['name'=> 'Ver permisos'  ]);

         //Carreras
         $carreras = Permission::create(['name'=> 'Ver carreras' ]);
         $carreras = Permission::create(['name'=> 'Crear carreras' ]);
         $carreras = Permission::create(['name'=> 'Actualizar carreras' ]);
         $carreras = Permission::create(['name'=> 'Eliminar carreras' ]);

         //Periodos
         $periodos = Permission::create(['name'=> 'Ver periodos' ]);
         $periodos = Permission::create(['name'=> 'Crear periodos' ]);
         $periodos = Permission::create(['name'=> 'Actualizar periodos' ]);
         $periodos = Permission::create(['name'=> 'Eliminar periodos' ]);

         //Secciones
         $secciones = Permission::create(['name'=> 'Ver secciones' ]);
         $secciones = Permission::create(['name'=> 'Crear secciones' ]);
         $secciones = Permission::create(['name'=> 'Actualizar secciones' ]);
         $secciones = Permission::create(['name'=> 'Eliminar secciones' ]);

         //Paralelos
         $paralelos = Permission::create(['name'=> 'Ver paralelos' ]);
         $paralelos = Permission::create(['name'=> 'Crear paralelos' ]);
         $paralelos = Permission::create(['name'=> 'Actualizar paralelos' ]);
         $paralelos = Permission::create(['name'=> 'Eliminar paralelos' ]);

         //Asignaturas
         $asignaturas = Permission::create(['name'=> 'Ver asignaturas' ]);
         $asignaturas = Permission::create(['name'=> 'Crear asignaturas' ]);
         $asignaturas = Permission::create(['name'=> 'Actualizar asignaturas' ]);
         $asignaturas = Permission::create(['name'=> 'Eliminar asignaturas' ]);

         //Periodos Academicos
         $periodacademicos = Permission::create(['name'=> 'Ver periodos academicos' ]);
         $periodacademicos = Permission::create(['name'=> 'Crear periodos academicos' ]);
         $periodacademicos = Permission::create(['name'=> 'Actualizar periodos academicos' ]);
         $periodacademicos = Permission::create(['name'=> 'Eliminar periodos academicos' ]);

         //Asignaciones
         $asignaciones = Permission::create(['name'=> 'Ver asignaciones' ]);
         $asignaciones = Permission::create(['name'=> 'Crear asignaciones' ]);
         $asignaciones = Permission::create(['name'=> 'Actualizar asignaciones' ]);
         $asignaciones = Permission::create(['name'=> 'Eliminar asignaciones' ]);

         //Estudiantes
         $estudiantes = Permission::create(['name'=> 'Ver estudiantes' ]);
         $estudiantes = Permission::create(['name'=> 'Crear estudiantes' ]);
         $estudiantes = Permission::create(['name'=> 'Actualizar estudiantes' ]);
         $estudiantes = Permission::create(['name'=> 'Eliminar estudiantes' ]);

        //Docentes
        $docentes =  Permission::create(['name'=> 'Ver docentes' ]);
        $docentes = Permission::create(['name'=> 'Crear docentes' ]);
        $docentes = Permission::create(['name'=> 'Actualizar docentes' ]);
        $docentes = Permission::create(['name'=> 'Eliminar docentes' ]);

        //Convalidacione
        $convalidaciones = Permission::create(['name'=> 'Ver convalidaciones' ]);
        $convalidaciones = Permission::create(['name'=> 'Crear convalidaciones' ]);
        $convalidaciones = Permission::create(['name'=> 'Actualizar convalidaciones' ]);
        $convalidaciones = Permission::create(['name'=> 'Eliminar convalidaciones' ]);

        //Matriculas
        $matriculas = Permission::create(['name'=> 'Ver matriculas' ]);
        $matriculas = Permission::create(['name'=> 'Crear matriculas' ]);
        $matriculas = Permission::create(['name'=> 'Actualizar matriculas' ]);
        $matriculas = Permission::create(['name'=> 'Eliminar matriculas' ]);

        //Horarios
        $horarios = Permission::create(['name'=> 'Ver horarios' ]);
        $horarios = Permission::create(['name'=> 'Crear horarios' ]);
        $horarios = Permission::create(['name'=> 'Actualizar horarios' ]);
        $horarios = Permission::create(['name'=> 'Eliminar horarios' ]);

        //Distributivos
        $distributivos = Permission::create(['name'=> 'Ver distributivos' ]);
        $distributivos = Permission::create(['name'=> 'Crear distributivos' ]);
        $distributivos = Permission::create(['name'=> 'Actualizar distributivos' ]);
        $distributivos = Permission::create(['name'=> 'Eliminar distributivos' ]);

        //Calificaciones
        $calificaciones = Permission::create(['name'=> 'Ver calificaciones' ]);
        $calificaciones = Permission::create(['name'=> 'Crear calificaciones' ]);
        $calificaciones = Permission::create(['name'=> 'Actualizar calificaciones' ]);
        $calificaciones = Permission::create(['name'=> 'Eliminar calificaciones' ]);

        //Suspensos
        $suspensos = Permission::create(['name'=> 'Ver suspensos' ]);
        $suspensos = Permission::create(['name'=> 'Crear suspensos' ]);
        $suspensos = Permission::create(['name'=> 'Actualizar suspensos' ]);
        $suspensos = Permission::create(['name'=> 'Eliminar suspensos' ]);

        //Reporte Egresados
        $egresados = Permission::create(['name'=> 'Ver egresados' ]);

        //Manuales
        $manuales = Permission::create(['name' => 'Ver manuales']);

        //record academico
        $recordacademicos = Permission::create(['name'=> 'Ver record academico' ]);

        //calificaciones por periodo
        $notasperiodos =  Permission::create(['name'=> 'Ver calificaciones por periodo' ]);

        //calificaciones por periodo
        $certificadosperiodos =  Permission::create(['name'=> 'Ver certificados por periodo' ]);

        //nomina de estudiantes
        $nominaestudiantes =  Permission::create(['name'=> 'Ver nonima de estudiantes' ]);

        //horario de clases
        $horarioclases =  Permission::create(['name'=> 'Ver horario de clases' ]);

}
}
