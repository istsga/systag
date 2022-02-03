<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuspensoStoreRequest;
use App\Http\Requests\SuspensoUpdateRequest;
use App\Models\Asignacione;
use App\Models\Asignacione_carrera;
use App\Models\Asignatura_matricula;
use App\Models\Calificacione;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Periodacademico;
use App\Models\Suspenso;
use Illuminate\Http\Request;

class SuspensoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', new Suspenso);

        $query=trim($request->get('periodacademico_id'));
        $queryAsignatura=trim($request->get('asignatura_id'));
        $queryAsignacione=trim($request->get('asignacione_id'));

        $periodacademicos = Periodacademico::get();
            // allowed()
        $suspensos = Suspenso::join('matriculas',function($join){
            $join->on('matriculas.asignacione_id','=','suspensos.asignacione_id')
                ->on('matriculas.estudiante_id','=','suspensos.estudiante_id');
            })
            ->join('asignatura_matricula',function($join){
                $join->on('asignatura_matricula.matricula_id','=','matriculas.id')
                    ->on('asignatura_matricula.asignatura_id','=','suspensos.asignatura_id');
            })
            ->select('suspensos.*','asignatura_matricula.estado_suspenso')
            ->where('suspensos.asignacione_id', $queryAsignacione)
            ->where('suspensos.asignatura_id', $queryAsignatura)
            //->allowed()
            ->get();


        $asignaciones = Asignacione::
            join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
            ->join('asignatura_docente','asignatura_docente.asignacione_id','=','asignaciones.id')
            ->where('asignacione_periodacademico.periodacademico_id',$query)
            ->select('asignaciones.*')
            ->allowed()
            ->groupBy('asignaciones.id')
            ->get();

        $asignaturas = Asignatura_matricula::
            join('matriculas','matriculas.id','=','asignatura_matricula.matricula_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_matricula.asignatura_id')
            ->join('asignatura_docente','asignatura_docente.asignatura_id','=','asignatura_matricula.asignatura_id')
            ->select('matriculas.asignacione_id','asignatura_matricula.asignatura_id','asignaturas.nombre','asignatura_docente.docente_id')
            ->where('matriculas.asignacione_id',$queryAsignacione)
            ->where('asignatura_docente.asignacione_id',$queryAsignacione)
            ->allowed()
            ->groupBy('matriculas.asignacione_id','asignatura_matricula.asignatura_id','asignatura_docente.docente_id')
            ->get();

        return view('suspensos.index', compact('suspensos', 'periodacademicos', 'asignaciones', 'query', 'asignaturas', 'queryAsignatura','queryAsignacione'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Suspenso::class);

        $periodacademicos = Periodacademico::get();
        // allowed()
        // ->get();

        $query=trim($request->get('asignacione_id'));

        $suspensos=Suspenso::all();

        $estudiantes = Estudiante::all();
        $asignaturas = [];
        $asignaciones = [];

        $queryAsignatura=trim($request->get('asignatura_id'));
        $matriculas=[];

        //dd($matriculas[0]->promedio_final);

        return view('suspensos.create', compact(
            'suspensos', 'asignaturas', 'estudiantes', 'asignaciones','matriculas','query',
            'periodacademicos', 'queryAsignatura'
        ));
    }

    public function getAsignacionessus($id)
    {
        $asignaciones = Asignacione::
            join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
            ->join('asignatura_docente','asignatura_docente.asignacione_id','=','asignaciones.id')
            ->join('asignacione_carrera','asignacione_carrera.asignacione_id','=','asignaciones.id')
            ->join('carreras','carreras.id','=','asignacione_carrera.carrera_id')
            ->join('periodos','periodos.id','=','asignaciones.periodo_id')
            ->join('secciones','secciones.id','=','asignaciones.seccione_id')
            ->join('paralelos','paralelos.id','=','asignaciones.paralelo_id')
            ->where('asignacione_periodacademico.periodacademico_id',$id)
            ->allowed()
            ->select('asignaciones.id','carreras.nombre','periodos.nombre as nombrePeriodo', 'secciones.nombre as nombreSeccion', 'paralelos.nombre as nombreParalelo')
            ->groupBy('asignaciones.id','carreras.nombre','periodos.nombre', 'secciones.nombre', 'paralelos.nombre')
            ->get();
        return $asignaciones;
    }

    public function getAsignaturassus($id)
    {
        $asignaturas = Asignatura_matricula::
        join('matriculas','matriculas.id','=','asignatura_matricula.matricula_id')
        ->join('asignaturas','asignaturas.id','=','asignatura_matricula.asignatura_id')
        ->join('asignatura_docente','asignatura_docente.asignatura_id','=','asignatura_matricula.asignatura_id')
        ->select('matriculas.asignacione_id','asignatura_matricula.asignatura_id','asignaturas.nombre','asignatura_docente.docente_id')
        ->where('matriculas.asignacione_id',$id)
        ->where('asignatura_docente.asignacione_id',$id)
        ->allowed()
        ->groupBy('matriculas.asignacione_id','asignatura_matricula.asignatura_id','asignatura_docente.docente_id')
        ->get();
        return($asignaturas);
    }

    public function getEstudiantessus($dato)
    {
        $datoNuevo=explode("_",$dato);
        $asignacione_id=$datoNuevo[0];
        $queryAsignatura=$datoNuevo[1];
        //dd($asignacione_id,$queryAsignatura);
        $matriculas=Matricula::
            join('asignatura_matricula','asignatura_matricula.matricula_id','=','matriculas.id')
            ->join('estudiantes','estudiantes.id','=','matriculas.estudiante_id')
            ->join('calificaciones',function($join){
                $join->on('calificaciones.estudiante_id','=','matriculas.estudiante_id')
                    ->on('calificaciones.asignatura_id','=','asignatura_matricula.asignatura_id')
                    ->on('calificaciones.asignacione_id','=','matriculas.asignacione_id');
            })
            ->where('matriculas.asignacione_id',$asignacione_id)
            ->where('asignatura_matricula.asignatura_id',$queryAsignatura)
            ->where('calificaciones.observacion','SUSPENSO')
            ->select('matriculas.*','calificaciones.promedio_final','estudiantes.nombre','estudiantes.apellido','estudiantes.dni')
            ->get();
            //dd($matriculas);
        return $matriculas;
    }

    public function getPromediosus($dato)
    {
        $datoNuevo=explode("_",$dato);
        $asignacione_id=$datoNuevo[0];
        $asignatura_id=$datoNuevo[1];
        $estudiante_id=$datoNuevo[2];

        $suspenso = Calificacione::
            where('calificaciones.asignacione_id', $asignacione_id)
            ->where('calificaciones.asignatura_id', $asignatura_id)
            ->where('calificaciones.estudiante_id', $estudiante_id)
            ->select('calificaciones.asignacione_id','calificaciones.asignatura_id','calificaciones.estudiante_id', 'calificaciones.promedio_final')
            ->groupBy('calificaciones.asignacione_id','calificaciones.asignatura_id','calificaciones.estudiante_id', 'calificaciones.promedio_final')
            ->get();

        return $suspenso;
    }

    //Habilitar edicion de suspensiones
    public function autorizarSuspenso($dato)
    {
        //Capturar 3 datos para evitar la confucion de otros estudiates
        $datoNuevo=explode("_",$dato);
        $asignacione_id=$datoNuevo[0];
        $estudiante_id=$datoNuevo[1];
        $asignatura_id=$datoNuevo[2];

        $matricula=Matricula::where('asignacione_id',$asignacione_id)
            ->where('estudiante_id',$estudiante_id)->first();
        if($matricula){
            $matricula_detalle=Asignatura_matricula::where('matricula_id',$matricula->id)
                ->where('asignatura_id',$asignatura_id)->first();
            if($matricula_detalle){
                $matricula_detalle->estado_suspenso = !$matricula_detalle->estado_suspenso;
                $matricula_detalle->update();
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuspensoStoreRequest $request)
    {
        $this->authorize('create', Suspenso::class);
        $suma=$request->get('promedio_final')+$request->get('examen_suspenso');

        $promedio_numero = round(($suma) / 2);
        $promedio_letras = $this->unidad($promedio_numero);

        if($promedio_numero)
            {
                if(round($promedio_numero) >=7){
                    $descripcion = 'APROBADO';
                }else{
                    $descripcion = 'REPROBADO';
                }
            }

        $suspensos = Suspenso::create($request->validated());
            // where('asignacione_id',$dkkdk)
            // ->where('');
        //$suspensos->promedio_final = $promedio_final;
        $suspensos->suma =  $suma;
        $suspensos->promedio_numero = $promedio_numero;
        $suspensos->promedio_letra = $promedio_letras;
        $suspensos->observacion =  $descripcion;
        $suspensos->save();
        return redirect()->route('suspensos.index')->with('status', 'Agregado con éxito');
    }


    private function unidad($numero){
        switch ($numero)
        {
            case 10:
            {
                $letter = "DIEZ";
                break;
            }
            case 9:
            {
                $letter = "NUEVE";
                break;
            }
            case 8:
            {
                $letter = "OCHO";
                break;
            }
            case 7:
            {
                $letter = "SIETE";
                break;
            }
            case 6:
            {
                $letter = "SEIS";
                break;
            }
            case 5:
            {
                $letter = "CINCO";
                break;
            }
            case 4:
            {
                $letter = "CUATRO";
                break;
            }
            case 3:
            {
                $letter = "TRES";
                break;
            }
            case 2:
            {
                $letter = "DOS";
                break;
            }
            case 1:
            {
                $letter = "UNO";
                break;
            }
            case 0:
            {
                $letter = "CERO";
                break;
            }
        }
        return $letter;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suspenso  $suspenso
     * @return \Illuminate\Http\Response
     */
    public function show(Suspenso $suspenso)
    {
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suspenso  $suspenso
     * @return \Illuminate\Http\Response
     */
    public function edit(Suspenso $suspenso)
    {
        $this->authorize('update', $suspenso);

        $matricula=Matricula::where('asignacione_id',$suspenso->asignacione_id)
        ->where('estudiante_id',$suspenso->estudiante_id)->first();
    if($matricula){
        $matricula_detalle=Asignatura_matricula::where('matricula_id',$matricula->id)
            ->where('asignatura_id',$suspenso->asignatura_id)->first();
        if($matricula_detalle){
            if($matricula_detalle->estado_suspenso==0){
                throw new \Illuminate\Auth\Access\AuthorizationException('La URL solicitada no válida.');
            }
        }else{
            throw new \Illuminate\Auth\Access\AuthorizationException('No esta matriculado en la asignatura.');
        }
    }else{
        throw new \Illuminate\Auth\Access\AuthorizationException('No tiene matrícula.');
    }

        $suspenso = Suspenso::join('asignatura_docente',function($join){
            $join->on('asignatura_docente.asignacione_id','=','suspensos.asignacione_id')
                ->on('asignatura_docente.asignatura_id','=','suspensos.asignatura_id');
            })
        ->where('suspensos.id',$suspenso->id)
        ->select('suspensos.*', 'asignatura_docente.docente_id')
        ->allowed()
        ->first();

        if($suspenso)
            return view('suspensos.edit', compact('suspenso'));
        else
        throw new \Illuminate\Auth\Access\AuthorizationException('La URL solicitada no válida.');

        //return view('suspensos.edit', compact('suspenso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suspenso  $suspenso
     * @return \Illuminate\Http\Response
     */
    public function update(SuspensoUpdateRequest $request, Suspenso $suspenso)
    {
        $this->authorize('update', $suspenso);
        $suspenso->update($request->validated());
        return redirect()->route('suspensos.index', $suspenso)->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suspenso  $suspenso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suspenso $suspenso)
    {
        return view('errors.404');
        // $this->authorize('delete', $suspenso);
        // $suspenso->delete();
        // return redirect()->route('suspensos.index')->with('status', 'Eliminado con éxito');
    }
}
