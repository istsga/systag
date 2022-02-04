<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Carrera_periodacademico;
use App\Models\Periodacademico;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Seccione;
use Illuminate\Http\Request;
use App\Http\Requests\AsignacioneStoreRequest;
use App\Http\Requests\AsignacioneUpdateRequest;

class AsignacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Asignacione);

            return view('asignaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Asignacione::class);

        $periodacademicos = Periodacademico::orderBy('id','desc')
        ->where('estado', 1)
        ->first();

        $carreras =Carrera_periodacademico::
           join('carreras','carreras.id','=','carrera_periodacademico.carrera_id')
           ->select('carrera_periodacademico.carrera_id','carreras.nombre','carrera_periodacademico.periodacademico_id', 'carreras.numero_periodo')
           ->get();
        $periodos = Periodo::all();
        $secciones = Seccione::all();
        $paralelos = Paralelo::all();

        $asignaciones = Asignacione::all();
        return view('asignaciones.create', compact('asignaciones', 'periodacademicos', 'carreras', 'periodos', 'secciones', 'paralelos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignacioneStoreRequest $request)
    {
        $this->authorize('create', Asignacione::class);

        $asignacion=Asignacione::join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
            ->join('asignacione_carrera','asignacione_carrera.asignacione_id','=','asignaciones.id')
            ->select('periodo_id','seccione_id','paralelo_id','asignacione_periodacademico.periodacademico_id as periodacademico_id','asignacione_carrera.carrera_id as carrera_id')
            ->where('periodo_id',$request->get('periodo_id'))
            ->where('seccione_id',$request->get('seccione_id'))
            ->where('paralelo_id',$request->get('paralelo_id'))
            ->where('asignacione_periodacademico.periodacademico_id',$request->get('periodacademicos'))
            ->where('asignacione_carrera.carrera_id',$request->get('carreras'))
            ->get();
        //dd(count($asignacion));
        if(count($asignacion)==0){ // No hay la hay asignacion que deseo grabar
            $asignacione = Asignacione::create($request->validated());
            $asignacione->periodacademicos()->sync($request->get('periodacademicos'));
            $asignacione->carreras()->sync($request->get('carreras'));

            return redirect()->route('asignaciones.index')->with('status', 'Agregado con éxito');
        } else{
                throw new \Illuminate\Auth\Access\AuthorizationException('Datos ya ha sido registrado, intentar con datos nuevos.');
            //$errors = 'Datos invalidos';
           // return redirect()->route('asignaciones.create')->with('status', 'Datos ya ha sido registrado, intentar con datos nuevos');
        }
    }


        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignacione  $asignacione
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacione $asignacione)
    {

        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignacione  $asignacione
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacione $asignacione)
    {
        $this->authorize('update', $asignacione);

        $periodacademicos = Periodacademico::orderBy('id','desc')
            ->where('estado', 1)
            ->first();

            //dd($periodacademicos);

        $carreras =Carrera_periodacademico::
           join('carreras','carreras.id','=','carrera_periodacademico.carrera_id')
           ->select('carrera_periodacademico.carrera_id','carreras.nombre','carrera_periodacademico.periodacademico_id', 'carreras.numero_periodo')
           ->get();
        $periodos = Periodo::all();
        $secciones = Seccione::all();
        $paralelos = Paralelo::all();
        return view('asignaciones.edit', compact('asignacione', 'periodacademicos', 'carreras', 'periodos', 'secciones', 'paralelos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignacione  $asignacione
     * @return \Illuminate\Http\Response
     */
    public function update(AsignacioneUpdateRequest $request, Asignacione $asignacione)
    {
        $this->authorize('update', $asignacione);
        $asignacione->update($request->validated());
        $asignacione->periodacademicos()->sync($request->get('periodacademicos'));
        $asignacione->carreras()->sync($request->get('carreras'));

        return redirect()->route('asignaciones.index')->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignacione  $asignacione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignacione $asignacione)
    {
        $this->authorize('delete', $asignacione);
        $asignacione->delete();
        return redirect()->route('asignaciones.index')->with('status', 'Eliminado con éxito');
    }
}
