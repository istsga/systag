<?php

namespace App\Http\Controllers;

use App\Models\Cantone;
use App\Models\Docente;
use App\Models\Provincia;
use App\Models\Tipocontrato;
use Illuminate\Http\Request;
use App\Http\Requests\DocenteStoreRequest;
use App\Http\Requests\DocenteUpdateRequest;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('docentes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Docente::class);
        $cantones = Cantone::all();
        $provincias = Provincia::all();
        $tipocontratos = Tipocontrato::all();
        return view('docentes.create', compact('provincias', 'tipocontratos',  'cantones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocenteStoreRequest $request)
    {

        $this->authorize('create', Docente::class);
        $docente = Docente::create($request->validated());

        return redirect()->route('docentes.index')->with('status', 'Agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //return view('errors.404');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        //dd($docente);
        $this->authorize('update', $docente);
        $provincias = Provincia::all();
        $cantones = Cantone::all();
        $tipocontratos = Tipocontrato::all();
        return view('docentes.edit', compact('docente', 'provincias', 'cantones', 'tipocontratos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(DocenteUpdateRequest $request, Docente $docente)
    {
        $this->authorize('update', $docente);
        $docente->update($request->validated());
        return redirect()->route('docentes.index')->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $this->authorize('delete', $docente);
        $docente->delete();
        return redirect()->route('docentes.index')->with('status', 'Eliminado con éxito');
    }
}
