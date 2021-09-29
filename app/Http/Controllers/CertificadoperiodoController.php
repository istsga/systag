<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Calificacione;
use App\Models\Certificadoperiodo;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Periodo;
use App\Models\Suspenso;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class CertificadoperiodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', new Certificadoperiodo);

        $estudiantes = Estudiante::all();
        $estudiante_id=$request->get('estudiante_id');

        $periodo_id=$request->get('periodo_id');
        $periodos=Periodo::
            join('asignaciones','asignaciones.periodo_id','=','periodos.id')
            ->join('matriculas','matriculas.asignacione_id','=','asignaciones.id')
            ->select('periodos.id','periodos.nombre')
            ->where('matriculas.estudiante_id',$estudiante_id)
            ->get();

        if($periodo_id){
                $estudiante=Estudiante::findOrFail($estudiante_id);
                $matricula=Matricula::
                    where('matriculas.estudiante_id',$estudiante->id)
                    ->first();// Revisar debido a que se esta tomando solo primer registro.

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

                // Relacionar con suspenso revisar
                $promedio=0;
                $suma=0;
                foreach($calificaciones as $calificacione){
                    $suma+=$calificacione->promedio_final;
                }
                $promedio=number_format($suma / count($calificaciones), 2);

                $pdf = PDF::loadView('reportes.reporteCertificadoperiodo', ['estudiante'=>$estudiante, 'matricula'=>$matricula, 'calificaciones'=>$calificaciones, 'promedio'=>$promedio]);
                return $pdf->stream('Reporte Certificado Periodo.pdf', compact('estudiante'));
        }

        return view('certificadoperiodos.index', compact('estudiantes','estudiante_id', 'periodos', 'periodo_id'));
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
