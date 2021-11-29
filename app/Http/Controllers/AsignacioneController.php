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

        $periodacademicos = Periodacademico::where('estado', 1)->get();
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

        $asignacione = Asignacione::create($request->validated());
        $asignacione->periodacademicos()->sync($request->get('periodacademicos'));
        $asignacione->carreras()->sync($request->get('carreras'));

        //dd( $asignacione->carreras()->sync($request->get('carreras[]')));

        return redirect()->route('asignaciones.index')->with('status', 'Agregado con éxito');
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
        $periodacademicos = Periodacademico::where('estado', 1)->get();
        $carreras =Carrera_periodacademico::
           join('carreras','carreras.id','=','Carrera_periodacademico.carrera_id')
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
