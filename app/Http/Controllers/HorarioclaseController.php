<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Asignatura_matricula;
use App\Models\Asignaturadocente;
use App\Models\Carrera;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Horario;
use App\Models\Matricula;
use App\Models\Periodacademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioclaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {

        $periodacademicos = Periodacademico::Estado()->get();

        //dd($periodacademicos);

        $query=trim($request->get('periodacademico_id'));
        $queryAsignacione=trim($request->get('asignacione_id'));
        $queryOrden=trim($request->get('orden'));

        $dni=auth()->user()->dni;

        $estudiante=Estudiante::where('dni',$dni)
                    ->first();

        $docente=Docente::where('dni',$dni)
                          ->first();

        if($estudiante){
            $asinaturas_mat=Asignatura_matricula::
                join('matriculas','matriculas.id','=','asignatura_matricula.matricula_id')

               ->where('matriculas.estudiante_id',$estudiante->id)
               ->select('asignatura_matricula.asignatura_id')
               ->pluck('asignatura_matricula.asignatura_id');
            //dd($asinaturas_mat,$estudiante->id,$query);
            $horarios0 = Horario::join('detalle_horarios','detalle_horarios.horario_id','=','horarios.id')
            ->join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','horarios.asignacione_id')
            ->join('asignatura_docente',function($join){
                $join->on('asignatura_docente.asignatura_id','=','horarios.asignatura_id')
                    ->on('asignatura_docente.asignacione_id','=','horarios.asignacione_id');
            })
            ->join('docentes','docentes.id','=','asignatura_docente.docente_id')
            ->join('asignaturas','asignaturas.id','=','horarios.asignatura_id')
            ->where('horarios.asignacione_id',$queryAsignacione)
             ->where('asignacione_periodacademico.periodacademico_id',$query)
             ->where('horarios.orden',$queryOrden)
             ->whereIn('asignaturas.id',$asinaturas_mat)
             ->selectRaw("detalle_horarios.hora_inicio,detalle_horarios.hora_final,detalle_horarios.dia_semana,asignaturas.nombre as nombrea,docentes.nombre as nombred,docentes.apellido")
             ->get();

            $horarios1 = Horario::join('detalle_horarios','detalle_horarios.horario_id','=','horarios.id')
                ->join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','horarios.asignacione_id')
                ->join('asignatura_docente',function($join){
                    $join->on('asignatura_docente.asignatura_id','=','horarios.asignatura_id')
                        ->on('asignatura_docente.asignacione_id','=','horarios.asignacione_id');
                })
                ->join('docentes','docentes.id','=','asignatura_docente.docente_id')
                ->join('asignaturas','asignaturas.id','=','horarios.asignatura_id')
                ->where('horarios.asignacione_id',$queryAsignacione)
                 ->where('asignacione_periodacademico.periodacademico_id',$query)
                 ->where('horarios.orden',$queryOrden)
                 ->whereIn('asignaturas.id',$asinaturas_mat)
                 ->selectRaw("detalle_horarios.hora_inicio,detalle_horarios.hora_final,'' as lunesnombreasignatura, '' as lunesnombredocente, ''as lunesapellidodocente,
                            '' as martesnombreasignatura, '' as martesnombredocente, '' as martesapellidodocente, '' as miercolesnombreasignatura, '' as miercolesnombredocente, '' as miercolesapellidodocente,
                            '' as juevesnombreasignatura, '' as juevesnombredocente, '' as juevesapellidodocente, '' as viernesnombreasignatura, '' as viernesnombredocente, '' as viernesapellidodocente,
                                horarios.fecha_inicio, horarios.fecha_final, horarios.fecha_examen, horarios.fecha_suspension ")
                 ->groupBy('detalle_horarios.hora_inicio','detalle_horarios.hora_final', 'horarios.fecha_inicio', 'horarios.fecha_final', 'horarios.fecha_examen', 'horarios.fecha_suspension')
                ->get();

        }else{
            $horarios0 = Horario::join('detalle_horarios','detalle_horarios.horario_id','=','horarios.id')
            ->join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','horarios.asignacione_id')
            ->join('asignatura_docente',function($join){
                $join->on('asignatura_docente.asignatura_id','=','horarios.asignatura_id')
                    ->on('asignatura_docente.asignacione_id','=','horarios.asignacione_id');
            })
            ->join('docentes','docentes.id','=','asignatura_docente.docente_id')
            ->join('asignaturas','asignaturas.id','=','horarios.asignatura_id')
            ->where('horarios.asignacione_id',$queryAsignacione)
             ->where('asignacione_periodacademico.periodacademico_id',$query)
             ->where('horarios.orden',$queryOrden)
             //->whereIn('asignaturas.id',$asinaturas_mat)
             ->selectRaw("detalle_horarios.hora_inicio,detalle_horarios.hora_final,detalle_horarios.dia_semana,asignaturas.nombre as nombrea,docentes.nombre as nombred,docentes.apellido")->get();
            $horarios1 = Horario::join('detalle_horarios','detalle_horarios.horario_id','=','horarios.id')
                ->join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','horarios.asignacione_id')
                ->join('asignatura_docente',function($join){
                    $join->on('asignatura_docente.asignatura_id','=','horarios.asignatura_id')
                        ->on('asignatura_docente.asignacione_id','=','horarios.asignacione_id');
                })
                ->join('docentes','docentes.id','=','asignatura_docente.docente_id')
                ->join('asignaturas','asignaturas.id','=','horarios.asignatura_id')
                ->where('horarios.asignacione_id',$queryAsignacione)
                ->where('asignacione_periodacademico.periodacademico_id',$query)
                ->where('horarios.orden',$queryOrden)
                //->where('asignatura_docente.docente_id',$docente->id)
                ->selectRaw("detalle_horarios.hora_inicio,detalle_horarios.hora_final,'' as lunesnombreasignatura, '' as lunesnombredocente, ''as lunesapellidodocente,
                        '' as martesnombreasignatura, '' as martesnombredocente, '' as martesapellidodocente, '' as miercolesnombreasignatura, '' as miercolesnombredocente, '' as miercolesapellidodocente,
                        '' as juevesnombreasignatura, '' as juevesnombredocente, '' as juevesapellidodocente, '' as viernesnombreasignatura, '' as viernesnombredocente, '' as viernesapellidodocente,
                            horarios.fecha_inicio, horarios.fecha_final, horarios.fecha_examen, horarios.fecha_suspension")
                ->groupBy('detalle_horarios.hora_inicio','detalle_horarios.hora_final','horarios.fecha_inicio', 'horarios.fecha_final', 'horarios.fecha_examen', 'horarios.fecha_suspension')
                ->allowed()
                ->get();
            //dd($horarios1);
        }

            foreach($horarios0 as $horario0){
                foreach($horarios1 as $horario1){
                    if($horario0->hora_inicio==$horario1->hora_inicio){
                        if($horario0->dia_semana=='Lunes'){
                            $horario1->lunesnombreasignatura=$horario0->nombrea;
                            $horario1->lunesnombredocente=$horario0->nombred;
                            $horario1->lunesapellidodocente=$horario0->apellido;
                        }
                        if($horario0->dia_semana=='Martes'){
                            $horario1->martesnombreasignatura=$horario0->nombrea;
                            $horario1->martesnombredocente=$horario0->nombred;
                            $horario1->martesapellidodocente=$horario0->apellido;
                        }
                        if($horario0->dia_semana=='Miércoles'){
                            $horario1->miercolesnombreasignatura=$horario0->nombrea;
                            $horario1->miercolesnombredocente=$horario0->nombred;
                            $horario1->miercolesapellidodocente=$horario0->apellido;
                        }
                        if($horario0->dia_semana=='Jueves'){
                            $horario1->juevesnombreasignatura=$horario0->nombrea;
                            $horario1->juevesnombredocente=$horario0->nombred;
                            $horario1->juevesapellidodocente=$horario0->apellido;
                        }
                        if($horario0->dia_semana=='Viernes'){
                            $horario1->viernesnombreasignatura=$horario0->nombrea;
                            $horario1->viernesnombredocente=$horario0->nombred;
                            $horario1->viernesapellidodocente=$horario0->apellido;
                        }
                    }
                }
            }


        $horarios = Horario::join('detalle_horarios','detalle_horarios.horario_id','=','horarios.id')
        ->join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','horarios.asignacione_id')
        ->join('asignatura_docente',function($join){
            $join->on('asignatura_docente.asignatura_id','=','horarios.asignatura_id')
                ->on('asignatura_docente.asignacione_id','=','horarios.asignacione_id');
        })
        ->join('docentes','docentes.id','=','asignatura_docente.docente_id')
        ->join('asignaturas','asignaturas.id','=','horarios.asignatura_id')

        ->where('horarios.asignacione_id',$queryAsignacione)
        ->where('asignacione_periodacademico.periodacademico_id',$query)
        ->where('horarios.orden',$queryOrden)
        ->selectRaw('detalle_horarios.hora_inicio,detalle_horarios.hora_final')
        ->groupBy('detalle_horarios.hora_inicio','detalle_horarios.hora_final')
        //->allowed()
        ->get();


        if($estudiante){
            $asigs=Matricula::
               where('matriculas.estudiante_id',$estudiante->id)
               ->select('matriculas.asignacione_id')
               ->pluck('matriculas.asignacione_id');

            $asignaciones = Asignacione::
                join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
                ->where('asignacione_periodacademico.periodacademico_id',$query)
                ->whereIn('asignaciones.id',$asigs)
                ->select('asignaciones.*')
                ->get();
        }
        if ($docente){
            $asigs=Asignaturadocente::
            where('docente_id',$docente->id)
            ->select('asignacione_id')
            ->pluck('asignacione_id');
            $asignaciones = Asignacione::
                join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
                ->where('asignacione_periodacademico.periodacademico_id',$query)
                ->whereIn('asignaciones.id',$asigs)
                ->select('asignaciones.*')
                ->get();
        }
        if(!($estudiante) and !($docente)){
            $asignaciones = Asignacione::
                join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
                ->where('asignacione_periodacademico.periodacademico_id',$query)
                //->where('horarios.orden',$queryOrden)
                ->select('asignaciones.*')
                ->get();
        }

        //parche
        if(count($asignaciones)==0)
            $queryOrden=0;

        return view('horarioclases.index', compact('horarios', 'horarios1', 'asignaciones', 'periodacademicos',  'query','estudiante', 'queryAsignacione', 'queryOrden' ));

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
