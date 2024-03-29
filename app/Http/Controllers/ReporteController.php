<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Calificacione;
use App\Models\Calificacionperiodo;
use App\Models\Carrera;
use App\Models\Convalidacione;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Horario;
use App\Models\Matricula;
use App\Models\Periodacademico;
use App\Models\Suspenso;
use App\Models\Egresado;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
        //REPORTE DE MATRICULAS
        public function reporteMatricula($id)
        {
            $this->authorize('view', new Matricula);

            $matricula = Matricula::
                join('asignaciones','asignaciones.id','=','matriculas.asignacione_id')
                ->join('periodos','periodos.id','=','asignaciones.periodo_id')
                ->select('matriculas.*')
                ->where('matriculas.id',$id)
                ->first();

            //realizar convalidacion
            $estudiante=$matricula->estudiante_id;
            $convalidacion = Convalidacione::
                join('asignaturas','asignaturas.id','=','convalidaciones.asignatura_id')
                ->where('convalidaciones.estudiante_id',$estudiante)
                ->where('asignaturas.periodo_id',$matricula->periodo_id)
                ->get();

            $pdf = PDF::loadView('reportes.reporteMatricula',['matricula'=>$matricula, 'convalidacion'=>$convalidacion])
            ->setPaper('a4');
            return $pdf->stream('Reporte Matricula.pdf',compact('matricula'));
        }

        // REPORTE DE HORARIO DE CLASE
        public function reporteHorarioClase($id){
            $pdf = PDF::loadView('reportes.reporteHorarioclase')
                ->setPaper('a4', 'landscape');
            return $pdf->stream(' Reporte Horario de Clase.pdf');
        }

        // REPORTE DE HORARIOS POR ESPECIALIDAD
        public function reporteHorarioE($dato)
        {
            $this->authorize('view', new horario);
            //revisar como pasar 2 parametros se empleo parche para recibir dos datos
            $datoNuevo=explode("_",$dato);
            $query=$datoNuevo[0];
            $queryCarrera=$datoNuevo[1];
            $horarios = Horario::
                join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','horarios.asignacione_id')
                ->join('asignacione_carrera','asignacione_carrera.asignacione_id','=','horarios.asignacione_id')
                ->where('asignacione_periodacademico.periodacademico_id',$query)
                ->where('asignacione_carrera.carrera_id',$queryCarrera)
                ->get();
            $pdf = PDF::loadView('reportes.reporteHorarioE',['horarios'=>$horarios])
            ->setPaper('a4', 'landscape');
            return $pdf->stream('Reporte Horario.pdf', compact('horarios'));
        }

        //REPORTE DE CALIFICACIONES
        public function reporteCalificacion($dato)
        {
            $this->authorize('view', new Calificacione);

            $datoNuevo=explode("_",$dato);
            $asignacione_id=$datoNuevo[0];
            $queryAsignatura=$datoNuevo[1];
            //$asignacione_id=$id;
            //$queryAsignatura=1; //trim($request->get('asignatura_id'));

            $calificaciones = Calificacione::
                where('asignacione_id', $asignacione_id)
                ->where('asignatura_id', $queryAsignatura)
                ->get();
            $docente = Docente::join('asignatura_docente','asignatura_docente.docente_id','=','docentes.id')
                ->where('asignatura_docente.asignacione_id',$asignacione_id)
                ->where('asignatura_docente.asignatura_id',$queryAsignatura)
                ->first();

            $pdf = PDF::loadView('reportes.reporteCalificacion',['calificaciones'=>$calificaciones, 'docente'=>$docente]);
            return $pdf->stream(' Reporte Calificacion.pdf');
        }

        //REPORTE DE SUSPENSO
        public function reporteSuspenso($dato)
        {
            $this->authorize('view', new suspenso);
            $datoNuevo=explode("_",$dato);
            $asignacione_id=$datoNuevo[0];
            $queryAsignatura=$datoNuevo[1];
            //$asignacione_id=$id;

            $suspensos = Suspenso::
                where('asignacione_id',$asignacione_id)
                ->where('asignatura_id', $queryAsignatura)
                ->get();
                $docente = Docente::join('asignatura_docente','asignatura_docente.docente_id','=','docentes.id')
                ->where('asignatura_docente.asignacione_id',$asignacione_id)
                ->where('asignatura_docente.asignatura_id',$queryAsignatura)
                ->first();

                //dd($docente);

            $pdf = PDF::loadView('reportes.reporteSuspenso',['suspensos'=>$suspensos, 'docente'=>$docente]);
            return $pdf->stream('Reporte Suspenso.pdf', compact('suspensos'));
        }

        // REPORTE DE CALIFICACION X PERIODO
        public function reporteCalificacionperiodo($id)
        {
            $this->authorize('create', new Calificacionperiodo);

            $datoNuevo=explode("_",$id);
            $estudiante_id=$datoNuevo[0];
            $periodo_id=$datoNuevo[1];

            $suspensos = Suspenso::where('suspensos.estudiante_id',$estudiante_id)
            ->join('asignaturas','asignaturas.id','=','suspensos.asignatura_id')
            ->where('asignaturas.periodo_id',$periodo_id)
            ->select('asignatura_id','examen_suspenso', 'observacion');

            $calificaciones=Calificacione::
                join('asignaturas','asignaturas.id','=','calificaciones.asignatura_id')
                ->leftjoinSub($suspensos,'suspensos',function($join){
                    $join->on('calificaciones.asignatura_id','=','suspensos.asignatura_id');
                })
                ->where('calificaciones.estudiante_id',$estudiante_id)
                ->where('asignaturas.periodo_id',$periodo_id)
                ->select('calificaciones.*','suspensos.examen_suspenso as suspensoNota', 'suspensos.observacion as observacionSuspenso' )
                ->get();

            $pdf = PDF::loadView('reportes.reporteCalificacionperiodo', ['calificaciones'=>$calificaciones])
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Calificación por periodo', compact('calificaciones'));
        }

        // REPORTE DE EGRESADOS
        public function reporteEgresado($dato)
        {
            $this->authorize('view', new Egresado);
            $datoNuevo=explode("_",$dato);
            $query_peraca=$datoNuevo[0];
            $queryCarrera=$datoNuevo[1];

            $periodo_academico=Periodacademico::where('id',$query_peraca)->first();
            $alumnos=Matricula::
            join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','matriculas.asignacione_id')
            ->join('asignacione_carrera','asignacione_carrera.asignacione_id','matriculas.asignacione_id')
            ->selectRaw('matriculas.asignacione_id,estudiante_id,0 as egresado')
            ->where('asignacione_periodacademico.periodacademico_id',$query_peraca)
            ->where('asignacione_carrera.carrera_id',$queryCarrera)
            ->get();
            foreach ($alumnos as $alumno){
                $malla=Asignatura::join('asignacione_carrera','asignacione_carrera.carrera_id','asignaturas.carrera_id')
                    ->where('asignacione_carrera.asignacione_id',$alumno->asignacione_id)
                    ->select('asignaturas.*')
                    ->get();
                // if($alumno->estudiante_id==1)
                //     dd($periodo_academico->fecha_final);
                $alumno->egresado=$this->esEgresado($alumno->estudiante_id,$malla,$periodo_academico->fecha_final);
            }


            $carreras=Carrera::findOrFail($queryCarrera);

            $pdf = PDF::loadView('reportes.reporteEgresado', ['alumnos'=>$alumnos,'periodo_academico'=>$periodo_academico->periodo, 'carreras'=>$carreras]);
            return $pdf->stream('Egresados', compact('alumnos'));

        }

        private function esEgresado($estudiante_id,$malla,$fecha_final_periodo)
        {
            $contador=0;
            foreach ($malla as $asignatura){
                $aprobado=Calificacione::where('estudiante_id',$estudiante_id)
                    ->where('asignatura_id',$asignatura->id)
                    ->whereIn('observacion',['APROBADO','EXONERADO'])
                    ->where('created_at','<=',$fecha_final_periodo)
                    ->first();

                if(!($aprobado)){
                    $convalidadaAprobada=Convalidacione::
                        where('estudiante_id',$estudiante_id)
                        ->where('asignatura_id',$asignatura->id)
                        ->where('nota_final','>=',7)
                        ->where('nota_final','<=',10)
                        ->first();
                    if($convalidadaAprobada)
                        $contador++;
                    else{
                        $suspensoAprobado=Suspenso::
                        where('estudiante_id',$estudiante_id)
                        ->where('asignatura_id',$asignatura->id)
                        ->where('observacion','APROBADO')
                        ->first();
                        if($suspensoAprobado)
                            $contador++;
                        else
                            return false;
                    }
                }else
                    $contador++;
            }

            if($contador==count($malla) and $contador>0)
                return true;
            else
                return false;
        }


}
