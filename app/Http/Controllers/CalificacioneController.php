<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalificacioneStoreRequest;
use App\Http\Requests\CalificacioneUpdateRequest;
use App\Models\Asignacione;
use App\Models\Asignatura_matricula;
use App\Models\Calificacione;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Periodacademico;
use App\Models\Suspenso;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalificacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query=trim($request->get('periodacademico_id'));
        $queryAsignatura=trim($request->get('asignatura_id'));
        $queryAsignacione=trim($request->get('asignacione_id'));

        $periodacademicos = Periodacademico::get();
            // allowed()
            // ->get();

        $calificaciones = Calificacione::join('matriculas',function($join){
            $join->on('matriculas.asignacione_id','=','calificaciones.asignacione_id')
                ->on('matriculas.estudiante_id','=','calificaciones.estudiante_id');
            })
            ->join('asignatura_matricula',function($join){
                $join->on('asignatura_matricula.matricula_id','=','matriculas.id')
                    ->on('asignatura_matricula.asignatura_id','=','calificaciones.asignatura_id');
            })
            ->select('calificaciones.*','asignatura_matricula.estado_calificacion')
            ->where('calificaciones.asignacione_id', $queryAsignacione)
            ->where('calificaciones.asignatura_id', $queryAsignatura)
            ->allowed()
            ->get();

        $asignaturas = Asignatura_matricula::
            join('matriculas','matriculas.id','=','asignatura_matricula.matricula_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_matricula.asignatura_id')
            ->join('asignatura_docente','asignatura_docente.asignatura_id','=','asignatura_matricula.asignatura_id')
            ->select('matriculas.asignacione_id','asignatura_matricula.asignatura_id','asignaturas.nombre','asignatura_docente.docente_id')
            ->where('matriculas.asignacione_id',$queryAsignacione)
            ->where('asignatura_docente.asignacione_id',$queryAsignacione)
            ->allowed()
            ->groupBy('matriculas.asignacione_id','asignatura_matricula.asignatura_id','asignatura_docente.docente_id')
            ->get();
        $asignaciones = Asignacione::
            join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
            ->join('asignatura_docente','asignatura_docente.asignacione_id','=','asignaciones.id')
            ->where('asignacione_periodacademico.periodacademico_id',$query)
            ->select('asignaciones.*')
            ->allowed()
            ->groupBy('asignaciones.id')
            ->get();

            //dd($calificaciones);

        return view('calificaciones.index', compact('calificaciones', 'periodacademicos', 'asignaciones', 'query', 'asignaturas', 'queryAsignatura','queryAsignacione'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Calificacione::class);

        $query=trim($request->get('periodacademico_id'));
        $queryAsignatura=trim($request->get('asignatura_id'));
        $queryAsignacione=trim($request->get('asignacione_id'));

        $periodacademicos = Periodacademico::get();
            // allowed()
            // ->get();

        $asignaciones = [];

        $calificaciones=Calificacione::all();
        $estudiantes = Estudiante::all();
        $asignaturas = [];

        $queryAsignatura=trim($request->get('asignatura_id'));
        $matriculas=[];

        return view('calificaciones.create', compact(
            'calificaciones', 'periodacademicos', 'asignaturas', 'estudiantes', 'asignaciones','matriculas','query','queryAsignatura'
        ));
    }

    public function getAsignacionescal($id)
    {
        $asignaciones = Asignacione::
            join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
            ->join('asignatura_docente','asignatura_docente.asignacione_id','=','asignaciones.id')
            ->join('asignacione_carrera','asignacione_carrera.asignacione_id','=','asignaciones.id')
            ->join('carreras','carreras.id','=','asignacione_carrera.carrera_id')
            ->join('periodos','periodos.id','=','asignaciones.periodo_id')
            ->join('secciones','secciones.id','=','asignaciones.seccione_id')
            ->join('paralelos','paralelos.id','=','asignaciones.paralelo_id')
            ->where('asignacione_periodacademico.periodacademico_id',$id)
            ->allowed()
            ->select('asignaciones.id','carreras.nombre','periodos.nombre as nombrePeriodo', 'secciones.nombre as nombreSeccion', 'paralelos.nombre as nombreParalelo')
            ->groupBy('asignaciones.id','carreras.nombre','periodos.nombre', 'secciones.nombre', 'paralelos.nombre')
            ->get();
        return $asignaciones;
    }

    public function getAsignaturascal($id){

        $asignaturas = Asignatura_matricula::
        join('matriculas','matriculas.id','=','asignatura_matricula.matricula_id')
        ->join('asignaturas','asignaturas.id','=','asignatura_matricula.asignatura_id')
        ->join('asignatura_docente','asignatura_docente.asignatura_id','=','asignatura_matricula.asignatura_id')
        //restrincion ingreso de notas por fechas
        ->join('horarios',function($join){
            $join->on('horarios.asignacione_id','=','matriculas.asignacione_id')
                ->on('horarios.asignatura_id','=','asignaturas.id');
        })
        ->select('matriculas.asignacione_id','asignatura_matricula.asignatura_id','asignaturas.nombre','horarios.fecha_suspension')
        ->where('matriculas.asignacione_id',$id)
        ->where('asignatura_docente.asignacione_id',$id)
         //restrincion ingreso de notas por fechas
        ->where('horarios.fecha_suspension','>=',now()->addDays(-16)->format('Y-m-d'))
        ->allowed()
        ->groupBy('matriculas.asignacione_id','asignatura_matricula.asignatura_id','asignaturas.nombre','horarios.fecha_suspension')
        ->get();
       //dd($asignaturas);
        return($asignaturas);
    }

    public function getEstudiantescal($dato){
        $datoNuevo=explode("_",$dato);
        $asignacione_id=$datoNuevo[0];
        $queryAsignatura=$datoNuevo[1];

        $matriculas=Matricula::
        join('asignatura_matricula','asignatura_matricula.matricula_id','=','matriculas.id')
        ->join('estudiantes','estudiantes.id','=','matriculas.estudiante_id')
        ->select('matriculas.asignacione_id','matriculas.estudiante_id','asignatura_matricula.asignatura_id','estudiantes.nombre', 'estudiantes.apellido', 'estudiantes.dni')
        ->where('asignacione_id',$asignacione_id)
        ->where('asignatura_matricula.asignatura_id',$queryAsignatura)
        ->get();
        //dd($matriculas);
        return ($matriculas);
    }

    //Habilitar edicion de calificaciones
    public function habilitarEstado($dato)
    {
        //Capturar 3 datos para evitar la confucion de otros estudiates
        $datoNuevo=explode("_",$dato);
        $asignacione_id=$datoNuevo[0];
        $estudiante_id=$datoNuevo[1];
        $asignatura_id=$datoNuevo[2];

        $matricula=Matricula::where('asignacione_id',$asignacione_id)
            ->where('estudiante_id',$estudiante_id)->first();
        if($matricula){
            $matricula_detalle=Asignatura_matricula::where('matricula_id',$matricula->id)
                ->where('asignatura_id',$asignatura_id)->first();
            if($matricula_detalle){
                $matricula_detalle->estado_calificacion = !$matricula_detalle->estado_calificacion;
                $matricula_detalle->update();
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalificacioneStoreRequest $request)
    {
        $this->authorize('create', Calificacione::class);

        $suma=$request->get('docencia')+$request->get('experimento_aplicacion')+$request->get('trabajo_autonomo');
        $examen=$request->get('examen_principal');
        $promedio = $suma / 3;
        $promedio_final =  round(($examen + $promedio) /2);
        $promedio_letras = $this->unidad($promedio_final);

        if($examen){
            if(round($promedio_final) >=7){
                if(round($promedio_final) == 10){
                    $descripcion = 'EXONERADO';
                }else{
                    $descripcion = 'APROBADO';
                }
            }else{
                $descripcion = 'SUSPENSO';
                //suspensos -graba automaicamente caundo esta reprobado
                    $suspensos = new Suspenso;
                    $suspensos->asignacione_id =  $request->get('asignacione_id');
                    $suspensos->estudiante_id  =  $request->get('estudiante_id');
                    $suspensos->asignatura_id  =  $request->get('asignatura_id');
                    $suspensos->promedio_final = $promedio_final;
                    $suspensos->promedio_letra = $promedio_letras;
                    $suspensos->save();
            }
        }else{
            $descripcion = 'EN CURSO';
        }

        $calificacion = new Calificacione($request->validated());
        $calificacion->suma =  $suma;
        $calificacion->promedio_decimal = $promedio;
        $calificacion->promedio_final = $promedio_final;
        $calificacion->promedio_letra = $promedio_letras;
        $calificacion->observacion =  $descripcion;
        $calificacion->save();

        return redirect()->route('calificaciones.index', $calificacion)->with('status', 'Agregado con éxito');
    }


    private function unidad($numero){
        switch ($numero)
        {
            case 10:
            {
                $letter = "DIEZ";
                break;
            }
            case 9:
            {
                $letter = "NUEVE";
                break;
            }
            case 8:
            {
                $letter = "OCHO";
                break;
            }
            case 7:
            {
                $letter = "SIETE";
                break;
            }
            case 6:
            {
                $letter = "SEIS";
                break;
            }
            case 5:
            {
                $letter = "CINCO";
                break;
            }
            case 4:
            {
                $letter = "CUATRO";
                break;
            }
            case 3:
            {
                $letter = "TRES";
                break;
            }
            case 2:
            {
                $letter = "DOS";
                break;
            }
            case 1:
            {
                $letter = "UNO";
                break;
            }
            case 0:
            {
                $letter = "CERO";
                break;
            }
        }
        return $letter;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificacione  $calificacione
     * @return \Illuminate\Http\Response
     */
    public function show(Calificacione $calificacione)
    {
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificacione  $calificacione
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificacione $calificacione)
    {
        $this->authorize('update', $calificacione);
        return view('calificaciones.edit', compact('calificacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificacione  $calificacione
     * @return \Illuminate\Http\Response
     */
    public function update(CalificacioneUpdateRequest $request, Calificacione $calificacione)
    {
        $this->authorize('update', $calificacione);
        $calificacione->update($request->validated());
        return redirect()->route('calificaciones.index', $calificacione)->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificacione  $calificacione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificacione $calificacione)
    {
        return view('errors.404');
        // $this->authorize('delete', $calificacione);
        // $calificacione->delete();
        // return redirect()->route('calificaciones.index')->with('status', 'Eliminado con éxito');
    }
}
