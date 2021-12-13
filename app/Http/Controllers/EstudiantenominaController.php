<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Estudiante;
use App\Models\Estudiantenomina;
use App\Models\Periodacademico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class EstudiantenominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', new Estudiantenomina);

        $periodacademicos = Periodacademico::all();

        $periodacademico_id=$request->get('periodacademico_id');
        $asignacione_id=$request->get('asignacione_id');

        $asignaciones = Asignacione::
        join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
        ->join('matriculas','matriculas.asignacione_id','=','asignaciones.id')
        ->where('asignacione_periodacademico.periodacademico_id',$periodacademico_id)
        ->select('asignaciones.*')
        ->groupBy('asignaciones.id')
        ->get();

        if($asignacione_id){
            $estudiantes = Estudiante::join('matriculas','matriculas.estudiante_id','=','estudiantes.id')
                ->where('matriculas.asignacione_id',$asignacione_id)
                ->select('dni','nombre','apellido')
                ->get();
            $asignacion=Asignacione::where('id',$asignacione_id)->first();
            $pdf = PDF::loadView('reportes.reporteEstudiantenominas', ['estudiantes'=>$estudiantes, 'asignacion'=>$asignacion]);
            return $pdf->stream('Reporte Certificado Periodo.pdf', compact('pdf'));
        }

        return view('estudiantenominas.index', compact('periodacademicos', 'periodacademico_id', 'asignacione_id', 'asignaciones'));
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
