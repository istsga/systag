<?php

namespace App\Http\Controllers;

use App\Http\Requests\HorarioStoreRequest;
use App\Http\Requests\HorarioUpdateRequest;
use App\Models\Asignacione;
use App\Models\Asignacione_carrera;
use App\Models\Asignatura;
use App\Models\Asignatura_matricula;
use App\Models\Asignaturadocente;
use App\Models\Carrera;
use App\Models\Detallehorario;
use App\Models\Estudiante;
use App\Models\Horario;
use App\Models\Periodacademico;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periodacademicos = Periodacademico::get();
        $query=trim($request->get('periodacademico_id'));
        $queryAsignacione=trim($request->get('asignacione_id'));
        //dd($query,$queryAsignacione);
        $horarios = Horario::
            // join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','horarios.asignacione_id')
            // ->join('asignacione_carrera','asignacione_carrera.asignacione_id','=','horarios.asignacione_id')
            join('detalle_horarios','detalle_horarios.horario_id','=','horarios.id')
            ->join('asignaturas','asignaturas.id','=','horarios.asignatura_id')
            ->join('asignatura_docente',function($join){
                $join->on('asignatura_docente.asignacione_id','=','horarios.asignacione_id');
                    //->on('asignatura_docente.asignatura_id','=','detalle_horarios.asignatura_id');
            })
            ->join('docentes','docentes.id','=','asignatura_docente.docente_id')
            ->groupBy('horarios.id','horarios.asignacione_id','horarios.fecha_inicio','horarios.fecha_final', 'horarios.fecha_examen', 'horarios.fecha_suspension', 'asignaturas.nombre', 'horarios.asignatura_id', 'docentes.nombre', 'docentes.apellido')
            ->where('horarios.asignacione_id',$queryAsignacione)
            ->select('horarios.id','horarios.asignacione_id','horarios.fecha_inicio','horarios.fecha_final', 'horarios.fecha_examen', 'horarios.fecha_suspension',  'asignaturas.nombre as nombreasignatura','docentes.nombre as nombredocente','docentes.apellido as apellidodocente', 'horarios.asignatura_id')
            ->get();

           //dd($horarios);

        $asignaciones = Asignacione::
        join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
        ->where('asignacione_periodacademico.periodacademico_id',$query)
        ->select('asignaciones.*')
        ->get();

        return view('horarios.index', compact('horarios', 'periodacademicos', 'query', 'queryAsignacione', 'asignaciones' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horario = new Horario;
        $this->authorize('create', $horario);
        $horarios = Horario::all();
        $asignaciones = Asignacione::all();
        $asignaturas = [];
        return view('horarios.create', compact('horarios', 'asignaciones', 'asignaturas'));
    }


    public function getAsignaturashor($id)
    {
        $asignacione_carrera=Asignacione_carrera::
            where('asignacione_id',$id)
            ->first();
        $asignacion=Asignacione::
            where('id',$id)
            ->first();
        $asignaturaYaAsignada=Asignaturadocente::
            select('asignatura_id')
            ->where('asignacione_id',$id)
            ->get()->toArray();

        $asignaturas = Asignatura::
            where('carrera_id', $asignacione_carrera->carrera_id)
            ->where('periodo_id',$asignacion->periodo_id)
            ->whereNotIn('id',$asignaturaYaAsignada)
            ->get();
        return $asignaturas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HorarioStoreRequest $request)
    {
        $this->authorize('create', new Horario);
        $horarios = Horario::create($request->validated());
        $dia_semana=$request->get('Dia_semana');
        $hora_inicio=$request->get('Hora_inicio');
        $hora_final=$request->get('Hora_final');
        $i=0;
        while($i<count($dia_semana)){
            $detalle_horario=new Detallehorario();
            $detalle_horario->horario_id=$horarios->id;
            $detalle_horario->dia_semana=$dia_semana[$i];
            $detalle_horario->hora_inicio=$hora_inicio[$i];
            $detalle_horario->hora_final=$hora_final[$i];
            //dd($detalle_horario);
            $detalle_horario->save();
            $i++;
        }
        return redirect()->route('horarios.index', $horarios)->with('status', 'Agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)
    {
        $this->authorize('update', $horario);
        $horarios = Horario::all();
        $asignaciones = Asignacione::all();
        $asignaturas = Asignatura::all();
        $detallehorarios = Detallehorario::get();
        return view('horarios.edit', compact('horario', 'asignaciones', 'asignaturas', 'detallehorarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(HorarioUpdateRequest $request, Horario $horario)
    {
        $this->authorize('update', $horario);

        $horario->update($request->validated());

        $dia_semana=$request->get('Dia_semana');
        $hora_inicio=$request->get('Hora_inicio');
        $hora_final=$request->get('Hora_final');
        $i=0;
        while($i<count($dia_semana)){
            $detalle_horario=new Detallehorario();
            $detalle_horario->horario_id=$horario->id;
            $detalle_horario->dia_semana=$dia_semana[$i];
            $detalle_horario->hora_inicio=$hora_inicio[$i];
            $detalle_horario->hora_final=$hora_final[$i];
            //dd($detalle_horario);
            $detalle_horario->save();
            $i++;
        }

        return redirect()->route('horarios.index', $horario)->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($dato)
    {


        $datoNuevo=explode("_",$dato);
        $horario_id=$datoNuevo[0];
        $asignatura_id=$datoNuevo[1];

        $horario=Horario::findOrFail($horario_id);
        //$this->authorize('delete', $horario);

        //dd($horario_id,$asignatura_id);
        Detallehorario::where('horario_id',$horario_id)->where('asignatura_id',$asignatura_id)->delete();
        $deta=Detallehorario::where('horario_id',$horario_id)->get();
        if(count($deta)==0){
            $horario=Horario::findOrFail($horario_id);
            $horario->delete();
        }
        return redirect()->route('horarios.index')->with('status', 'Eliminado con éxito');
    }
}
