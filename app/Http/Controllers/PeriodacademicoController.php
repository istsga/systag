<?php

namespace App\Http\Controllers;

use App\Models\Periodacademico;
use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Http\Requests\PeriodacademicoStoreRequest;
use App\Http\Requests\PeriodacademicoUpdateRequest;

class PeriodacademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Periodacademico);

        $periodacademicos = Periodacademico::with('carreras')
        ->latest('id')
        ->paginate();
        return view('periodacademicos.index', compact('periodacademicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Periodacademico);
        $carreras = Carrera::where('condicion', 1)->get();
        return view('periodacademicos.create', compact( 'carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeriodacademicoStoreRequest $request)
    {
        $this->authorize('create', new Periodacademico);
        $periodacademico = Periodacademico::create($request->validated());
        //Asignar Carreras
        $periodacademico->carreras()->sync($request->get('carreras'));

        return redirect()->route('periodacademicos.index', $periodacademico)->with('status', 'Agregado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodacademico  $periodacademico
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodacademico $periodacademico)
    {
        $this->authorize('update', $periodacademico);
        $carreras = Carrera::where('condicion', 1)->get();
        return view('periodacademicos.edit', compact('periodacademico', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periodacademico  $periodacademico
     * @return \Illuminate\Http\Response
     */
    public function update(PeriodacademicoUpdateRequest $request, Periodacademico $periodacademico)
    {
        $this->authorize('update', $periodacademico);
        $periodacademico->update($request->validated());
        $periodacademico->carreras()->sync($request->get('carreras'));
        return redirect()->route('periodacademicos.index', $periodacademico)->with('status', 'Actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodacademico  $periodacademico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodacademico $periodacademico)
    {
        $this->authorize('delete', $periodacademico);
        $periodacademico->delete();
        return redirect()->route('periodacademicos.index')->with('status', 'Eliminado con éxito');
    }
}
