<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Calificacione;
use App\Models\Carrera;
use App\Models\Convalidacione;
use App\Models\Matricula;
use App\Models\Periodacademico;
use App\Models\Suspenso;
use Illuminate\Http\Request;

class EgresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$this->authorize('view', new egresado);

        $periodacademicos = Periodacademico::all();
        $query_peraca=trim($request->get('periodacademico_id'));
        $queryCarrera=trim($request->get('carrera_id'));
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

        $carreras = Carrera::
        join('carrera_periodacademico','carrera_periodacademico.carrera_id','=','carreras.id')
        ->select('carreras.id','carreras.nombre')
        ->where('carrera_periodacademico.periodacademico_id',$query_peraca)
        ->get();

        return view('egresados.index', compact('periodacademicos','alumnos', 'carreras', 'queryCarrera', 'query_peraca'));
    }



    private function esEgresado($estudiante_id,$malla,$fecha_final_periodo) {
        $contador=0;
        foreach ($malla as $asignatura){
            $aprobado=Calificacione::where('estudiante_id',$estudiante_id)
                ->where('asignatura_id',$asignatura->id)
                ->where('observacion','APROBADO')
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
