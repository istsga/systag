<?php

namespace App\Http\Controllers;

use App\Models\Calificacione;
use App\Models\Estudiante;
use App\Models\Periodo;
use App\Models\Suspenso;
use Illuminate\Http\Request;

class CalificacionperiodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estudiantes = Estudiante::allowed()->get();
        $periodo_id=$request->get('periodo_id');
        $estudiante_id=$request->get('estudiante_id');
        $periodos=Periodo::
            join('asignaciones','asignaciones.periodo_id','=','periodos.id')
            ->join('matriculas','matriculas.asignacione_id','=','asignaciones.id')
            ->select('periodos.id','periodos.nombre')
            ->where('matriculas.estudiante_id',$estudiante_id)
            ->get();

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
            ->select('calificaciones.*','suspensos.examen_suspenso as suspensoNota', 'suspensos.observacion as ObservacionSuspenso' )
            ->get();
        // dd($calificaciones);

        return view('calificacionperiodos.index', compact('estudiantes', 'periodos', 'estudiante_id', 'calificaciones', 'periodo_id' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
