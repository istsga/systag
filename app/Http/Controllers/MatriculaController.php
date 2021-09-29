<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatriculaStoreRequest;
use App\Http\Requests\MatriculaUpdateRequest;
use App\Models\Asignacione;
use App\Models\Asignacione_carrera;
use App\Models\Asignacione_periodo;
use App\Models\Asignatura;
use App\Models\Calificacione;
use App\Models\Convalidacione;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Periodacademico;
use App\Models\Periodo;
use App\Models\Prerequisito;
use App\Models\Suspenso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', new Matricula);

        return view('matriculas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Matricula::class);
        $query_asignacion=trim($request->get('asignacione_id'));
        $asignaturas = [];
        $matriculas = Matricula::all();
        $asignaciones=Asignacione::all();
        $estudiantes = Estudiante::all();
        $periodos = Periodo::all();

        return view('matriculas.create', compact(
            'matriculas', 'asignaciones', 'estudiantes', 'asignaturas', 'periodos', 'query_asignacion'
        ));
    }

    public function getAsignaciones($estudiante_id){

        //Estudiantes ya matriculados
        $yaMatriculado=Matricula::
            select('asignacione_id')
            ->where('estudiante_id',$estudiante_id)
            ->get()->toArray();

        //Matricula del estudiante
        $matricula=Matricula::where('estudiante_id',$estudiante_id)->first();

        if($matricula){
            $asignacione_carrera=Asignacione_carrera::
            where('asignacione_id',$matricula->asignacione_id)
            ->first();
            $asignaciones=Asignacione_carrera::
            join('carreras','carreras.id','=','asignacione_carrera.carrera_id')
            ->join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignacione_carrera.asignacione_id')
            ->join('periodacademicos','periodacademicos.id','=','asignacione_periodacademico.periodacademico_id')
            ->join('asignaciones','asignaciones.id','=','asignacione_carrera.asignacione_id')
            ->join('periodos','periodos.id','=','asignaciones.periodo_id')
            ->join('secciones','secciones.id','=','asignaciones.seccione_id')
            ->join('paralelos','paralelos.id','=','asignaciones.paralelo_id')
            ->select('asignacione_carrera.asignacione_id','carreras.nombre', 'periodos.nombre as nombrePeriodo','periodacademicos.periodo as periodoAcademico', 'periodacademicos.estado',  'secciones.nombre as nombreSeccion', 'paralelos.nombre as nombreParalelo')
            ->whereNotIn('asignacione_carrera.asignacione_id',$yaMatriculado)
            ->where('periodacademicos.estado', 'Nuevo' )
            ->where('carrera_id',$asignacione_carrera->carrera_id)->get();

        }else{
            $asignaciones=Asignacione_carrera::
            join('carreras','carreras.id','=','asignacione_carrera.carrera_id')
            ->join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignacione_carrera.asignacione_id')
            ->join('periodacademicos','periodacademicos.id','=','asignacione_periodacademico.periodacademico_id')
            ->join('asignaciones','asignaciones.id','=','asignacione_carrera.asignacione_id')
            ->join('periodos','periodos.id','=','asignaciones.periodo_id')
            ->join('secciones','secciones.id','=','asignaciones.seccione_id')
            ->join('paralelos','paralelos.id','=','asignaciones.paralelo_id')
            ->select('asignacione_carrera.asignacione_id','carreras.nombre', 'periodos.nombre as nombrePeriodo','periodacademicos.periodo as periodoAcademico', 'periodacademicos.estado',  'secciones.nombre as nombreSeccion', 'paralelos.nombre as nombreParalelo')
            ->where('periodacademicos.estado', 'Nuevo' )
            ->get();
        }

    return $asignaciones;
  }


    public function getAsignaturas($id, $estudiante_id){

        //dd($matriculas);
        $asignacion=Asignacione::find($id);
        $asignacion_carrera=Asignacione_carrera::
            join('asignaciones','asignaciones.id','=','asignacione_carrera.asignacione_id')
            ->get();

            //convalidaciones
        $asig_convalidadas=Convalidacione::
            select('asignatura_id')
            ->where('estudiante_id',$estudiante_id)
            ->get()->toArray();

        $asignaturas = Asignatura::
            where('carrera_id', $asignacion_carrera[0]->carrera_id)
            ->where('periodo_id',$asignacion->periodo_id)
            ->whereNotIn('id',$asig_convalidadas);

        //calificacion del estudiante de asignaturas con prerequisito
        $calificacionesEstudiante = Calificacione::
        where('estudiante_id',$estudiante_id);

        //Prerequisito
        $prerequisito=Prerequisito::
            joinSub($asignaturas,'asignaturas',function($join){
                $join->on('prerequisitos.asignatura_id','=','asignaturas.id');
            })
            ->leftjoinSub($calificacionesEstudiante,'calificacionesEstudiante',function($join){
                $join->on('prerequisitos.preasignatura_id','=','calificacionesEstudiante.asignatura_id');
            })
            ->select('prerequisitos.id','prerequisitos.asignatura_id','prerequisitos.preasignatura_id','calificacionesEstudiante.observacion')
            ->where('calificacionesEstudiante.observacion','=',null);

        //dd($prerequisito);

        $asignaturas2 = Asignatura::
            where('carrera_id', $asignacion_carrera[0]->carrera_id)
            ->where('periodo_id',$asignacion->periodo_id)
            ->whereNotIn('asignaturas.id',$asig_convalidadas)
            ->select('asignaturas.*',DB::raw('0 as cumple'))
            ->get();
        foreach ($asignaturas2 as $asignatura)
            {
                $asignatura->cumple=$this->cumplePrerequisito($asignatura->id,$estudiante_id);
            }
        //dd($asignaturas2);
        // Asignaturas arrastres



        //asignaturas no matriculadas

        //perdida por 3ra matricula


        return $asignaturas2;

  }

  public function cumplePrerequisito($asignatura_id,$estudiante_id){
        $cumple=false; $conteo=0;
        $pres=Prerequisito::where('asignatura_id',$asignatura_id)->get();
        foreach ($pres as $pre)
            {
                $calificacionesEstudiante = Calificacione::
                    where('estudiante_id',$estudiante_id)
                    ->where('asignatura_id',$pre->preasignatura_id)
                    ->where('calificaciones.observacion','APROBADO')
                    ->get();
                $suspenso=Suspenso::
                    where('estudiante_id',$estudiante_id)
                    ->where('asignatura_id',$pre->preasignatura_id)
                    ->where('suspensos.observacion','APROBADO')
                    ->get();
                $asig_convalidada=Convalidacione::
                    select('asignatura_id')
                    ->where('estudiante_id',$estudiante_id)
                    ->where('asignatura_id',$pre->preasignatura_id)
                    ->where('nota_final','>=',7)
                    ->get();
                if(count($calificacionesEstudiante)==1 or count($suspenso)==1 or count($asig_convalidada)==1)
                $conteo++;
            }
        if($conteo == count($pres))
            $cumple=true;
        if(count($pres)==0)
            $cumple=true;   //No tiene prerequisitos

        return $cumple;
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculaStoreRequest $request)
    {
        $this->authorize('create', Matricula::class);
        $matricula = Matricula::create($request->validated());
        $matricula->asignaturas()->sync($request->get('asignaturas'));
        return redirect()->route('matriculas.index')->with('status', 'Agregado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        $this->authorize('update', $matricula);
        $matriculas = Matricula::all();
        $asignaciones=Asignacione::all();
        $estudiantes = Estudiante::all();
        $asignaturas = Asignatura::all();
        return view('matriculas.edit',
                compact( 'matricula', 'asignaciones', 'estudiantes', 'asignaturas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(MatriculaUpdateRequest $request, Matricula $matricula)
    {
        $this->authorize('update', $matricula);
        $matricula->update($request->validated());
        return redirect()->route('matriculas.index')->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        $this->authorize('delete', $matricula);
        $matricula->delete();
        return redirect()->route('matriculas.index')->with('status', 'Eliminado con éxito');
    }
}
