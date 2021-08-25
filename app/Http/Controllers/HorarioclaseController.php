<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Asignatura_matricula;
use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\Horario;
use App\Models\Periodacademico;
use Illuminate\Http\Request;

class HorarioclaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $periodacademicos = Periodacademico::all();
        $query=trim($request->get('periodacademico_id'));
        $queryAsignacione=trim($request->get('asignacione_id'));

        $dni=auth()->user()->dni;

        $estudiante=Estudiante::where('dni',$dni)->first();
        if(!$estudiante){
            $horarios = Horario::join('detalle_horarios','detalle_horarios.horario_id','=','horarios.id')
            ->join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','horarios.asignacione_id')
            ->join('asignatura_docente',function($join){
                $join->on('asignatura_docente.asignatura_id','=','detalle_horarios.asignatura_id')
                    ->on('asignatura_docente.asignacione_id','=','horarios.asignacione_id');
            })
            ->join('docentes','docentes.id','=','asignatura_docente.docente_id')
            ->join('asignaturas','asignaturas.id','=','detalle_horarios.asignatura_id')
            ->where('horarios.asignacione_id',$queryAsignacione)

             ->where('asignacione_periodacademico.periodacademico_id',$query)
             ->selectRaw("horarios.fecha_inicio,horarios.fecha_final,horarios.fecha_examen,horarios.fecha_suspension,
                    detalle_horarios.hora_inicio,detalle_horarios.hora_final,
                    if(detalle_horarios.dia_semana='Lunes',asignaturas.nombre,'') as lunesnombreasignatura,
                    if(detalle_horarios.dia_semana='Lunes',docentes.nombre,'') as lunesnombredocente,
                    if(detalle_horarios.dia_semana='Lunes',docentes.apellido,'') as lunesapellidodocente,
                    if(detalle_horarios.dia_semana='Martes',asignaturas.nombre,'') as martesnombreasignatura,
                    if(detalle_horarios.dia_semana='Martes',docentes.nombre,'') as martesnombredocente,
                    if(detalle_horarios.dia_semana='Martes',docentes.apellido,'') as martesapellidodocente,
                    if(detalle_horarios.dia_semana='Miércoles',asignaturas.nombre,'') as miercolesnombreasignatura,
                    if(detalle_horarios.dia_semana='Miércoles',docentes.nombre,'') as miercolesnombredocente,
                    if(detalle_horarios.dia_semana='Miércoles',docentes.apellido,'') as miercolesapellidodocente,
                    if(detalle_horarios.dia_semana='Jueves',asignaturas.nombre,'') as juevesnombreasignatura,
                    if(detalle_horarios.dia_semana='Jueves',docentes.nombre,'') as juevesnombredocente,
                    if(detalle_horarios.dia_semana='Jueves',docentes.apellido,'') as juevesapellidodocente,
                    if(detalle_horarios.dia_semana='Viernes',asignaturas.nombre,'') as viernesnombreasignatura,
                    if(detalle_horarios.dia_semana='Viernes',docentes.nombre,'') as viernesnombredocente,
                    if(detalle_horarios.dia_semana='Viernes',docentes.apellido,'') as viernesapellidodocente")

                ->groupBy('horarios.fecha_inicio','horarios.fecha_final','horarios.fecha_examen','horarios.fecha_suspension',
                    'detalle_horarios.hora_inicio','detalle_horarios.hora_final',
                    'lunesnombreasignatura', 'lunesnombredocente', 'lunesapellidodocente',
                    'martesnombreasignatura', 'martesnombredocente', 'martesapellidodocente',
                    'miercolesnombreasignatura', 'miercolesnombredocente', 'miercolesapellidodocente',
                    'juevesnombreasignatura', 'juevesnombredocente', 'juevesapellidodocente',
                    'viernesnombreasignatura', 'viernesnombredocente', 'viernesapellidodocente')
        //     ->allowed()
             ->get();
        //dd($horarios);
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

        $asignaciones = Asignacione::all();
        return view('horarioclases.index', compact('horarios', 'asignaciones', 'periodacademicos', 'carreras',  'query','estudiante', 'queryAsignacione' ));

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
