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
        $periodacademicos = Periodacademico::all();
        $query=trim($request->get('periodacademico_id'));
        $queryCarrera=trim($request->get('carrera_id'));

        $dni=auth()->user()->dni;

        $estudiante=Estudiante::where('dni',$dni)->first();
        if(!$estudiante){
        $horarios = Horario::
            join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','horarios.asignacione_id')
            ->join('asignacione_carrera','asignacione_carrera.asignacione_id','=','horarios.asignacione_id')
            //->join('asignatura_docente','asignatura_docente.asignatura_id','=','horarios.asignatura_id')
            ->join('asignatura_docente',function($join){
                //$join->on('asignatura_docente.asignatura_id','=','horarios.asignatura_id')
                $join->on('asignatura_docente.asignacione_id','=','horarios.asignacione_id');
            })
            ->join('docentes','docentes.id','=','asignatura_docente.docente_id')
            ->where('asignacione_periodacademico.periodacademico_id',$query)
            ->where('asignacione_carrera.carrera_id',$queryCarrera)
            ->select('horarios.*', 'docentes.nombre as nombredocente','docentes.apellido as apellidodocente')
            ->allowed()
            //->groupBy('horarios.id','horarios.asignacione_id','horarios.asignatura_id', 'horarios.fecha_inicio', 'horarios.fecha_final', 'horarios.fecha_examen', 'horarios.fecha_suspension' )
            ->get();
        }else{
            // Tomamos el horario de todas asignaturas a la cual esta matriculado el estudiante
            //$estudiante_id=5;
            $asinaturas_mat=Asignatura_matricula::
                join('matriculas','matriculas.id','=','asignatura_matricula.matricula_id')

               ->where('matriculas.estudiante_id',$estudiante->id)
               ->select('asignatura_matricula.asignatura_id');
            $horarios = Horario::
                join('matriculas',function($join){
                    $join->on('horarios.asignacione_id','=','matriculas.asignacione_id');
                        //->on('horarios.asignatura_id','=','asignatura_matricula.asignatura_id');
                })

            ->join('asignatura_docente',function($join){
                //$join->on('asignatura_docente.asignatura_id','=','horarios.asignatura_id')
                $join->on('asignatura_docente.asignacione_id','=','horarios.asignacione_id');
            })
            ->join('docentes','docentes.id','=','asignatura_docente.docente_id')

            // ->joinSub($asinaturas_mat, 'asinaturas_mat', function ($join) {
            //     $join->on('horarios.asignatura_id', '=', 'asinaturas_mat.asignatura_id');
            // })

            ->allowed2()
            //->where('estudiante_id',$estudiante_id)

            ->select('horarios.*', 'docentes.nombre as nombredocente','docentes.apellido as apellidodocente','matriculas.id as matricula_id')
            ->get();
        }

        $carreras = Carrera::
            join('carrera_periodacademico','carrera_periodacademico.carrera_id','=','carreras.id')
            //->join('asignacione_carrera','asignacione_carrera.carrera_id','=','carreras.id')
            ->select('carreras.id','carreras.nombre')
            ->where('carrera_periodacademico.periodacademico_id',$query)
            ->get();
        return view('horarios.index', compact('horarios', 'periodacademicos', 'carreras',  'query', 'queryCarrera', 'estudiante' ));
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
        $asignatura_id=$request->get('Asignatura_id');
        $hora_inicio=$request->get('Hora_inicio');
        $hora_final=$request->get('Hora_final');
        $i=0;
        while($i<count($dia_semana)){
            $detalle_horario=new Detallehorario();
            $detalle_horario->horario_id=$horarios->id;
            $detalle_horario->dia_semana=$dia_semana[$i];
            $detalle_horario->asignatura_id=$asignatura_id[$i];
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
        return view('horarios.edit', compact('horario', 'asignaciones', 'asignaturas'));
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
        return redirect()->route('horarios.index', $horario)->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        $this->authorize('delete', $horario);
        $horario->delete();
        return redirect()->route('horarios.index')->with('status', 'Eliminado con éxito');
    }
}
