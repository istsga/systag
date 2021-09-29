<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Calificacione;
use App\Models\Convalidacione;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Periodacademico;
use App\Models\Periodo;
use App\Models\Suspenso;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class RecordacademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('view', new recordacademico);
        $estudiantes = Estudiante::allowed()->get();
        $estudiante_id=$request->get('estudiante_id');

        if ($estudiante_id){
            $estudiante=Estudiante::findOrFail($estudiante_id);
            $matricula=Matricula::
                where('matriculas.estudiante_id',$estudiante->id)
                ->first();  // Revisar debido a que se esta tomando solo primer registro.
            $asignaturas=Asignatura::
                where('asignaturas.carrera_id',$matricula->asignacione->carreras->pluck('id')->implode(', '))
                ->get();

            $convalidaciones = Convalidacione::where('estudiante_id',$estudiante_id)
                ->join('asignaturas','asignaturas.id','=','convalidaciones.asignatura_id')
                ->get();

            $suspensos = Suspenso::where('suspensos.estudiante_id',$estudiante_id)
            ->join('asignaturas','asignaturas.id','=','suspensos.asignatura_id')
            ->select('asignatura_id','examen_suspenso', 'observacion as observacionSuspenso');

            $calificaciones=Calificacione::
                join('asignaturas','asignaturas.id','=','calificaciones.asignatura_id')
                ->leftjoinSub($suspensos,'suspensos',function($join){
                    $join->on('calificaciones.asignatura_id','=','suspensos.asignatura_id');
                })
                ->where('calificaciones.estudiante_id',$estudiante_id)
                ->get();

            $periodacademicos = Periodacademico::all();
            $periodos = Periodo::all();

            $pdf = PDF::loadView('reportes.reporteRecordacademicos', ['estudiante'=>$estudiante, 'matricula'=>$matricula, 'asignaturas'=>$asignaturas, 'calificaciones'=>$calificaciones,
            'periodacademicos'=>$periodacademicos, 'periodos'=>$periodos, 'convalidaciones'=>$convalidaciones, 'suspensos'=>$suspensos ]);
            return $pdf->stream('Reporte Record Academico.pdf', compact('pdf'));

        }

        return view('recordacademicos.index', compact('estudiantes','estudiante_id'));
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
