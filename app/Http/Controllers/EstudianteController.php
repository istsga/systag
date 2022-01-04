<?php

namespace App\Http\Controllers;

use App\Models\Cantone;
use App\Models\Estadocivile;
use App\Models\Estudiante;
use App\Models\Etnia;
use App\Models\Instruccione;
use App\Models\Provincia;
use App\Models\Tiposangre;
use Illuminate\Http\Request;
use App\Http\Requests\EstudianteStoreRequest;
use App\Http\Requests\EstudianteUpdateRequest;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Estudiante);
        return view('estudiantes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', new Estudiante);
        //$this->authorize('create', Estudiante::class);
        $query_canton=$request->get('direccion_cantone_id');
        if($query_canton)
            dd($query_canton);
        $estadociviles = Estadocivile::all();
        $provincias = Provincia::all();
        $cantones = Cantone::all();
        $etnias = Etnia::all();
        $tiposangres = Tiposangre::all();
        $instrucciones = Instruccione::all();
        return view('estudiantes.create', compact('estadociviles',  'provincias', 'cantones', 'etnias', 'tiposangres', 'instrucciones', 'query_canton'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudianteStoreRequest $request)
    {
        $this->authorize('create', Estudiante::class);
        $estudiante = new Estudiante($request->validated());
        $estudiante->foto = $request->file('foto')->store('images', 'public');
        $estudiante->save();
        return redirect()->route('estudiantes.index')->with('status', 'Agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        $this->authorize('update', $estudiante);
        $estadociviles = Estadocivile::all();
        $provincias = Provincia::all();
        $cantones = Cantone::all();
        $etnias = Etnia::all();
        $tiposangres = Tiposangre::all();
        $instrucciones = Instruccione::all();
        return view('estudiantes.edit', compact('estudiante','estadociviles', 'provincias', 'cantones', 'etnias', 'tiposangres', 'instrucciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(EstudianteUpdateRequest $request, Estudiante $estudiante)
    {
        $this->authorize('update', $estudiante);
        if( $request->hasFile('foto'))
        {
            //Elimina foto anterior
            Storage::delete('public/'.$estudiante->foto);
            $estudiante->fill( $request->validated());
            $estudiante->foto = $request->file('foto')->store('images', 'public');
            $estudiante->save();

        } else
        {
            $estudiante->update( array_filter($request->validated()));
        }

        return redirect()->route('estudiantes.index')->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $this->authorize('delete', $estudiante);
        Storage::delete('public/'.$estudiante->foto);
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('status', 'Eliminado con éxito');
    }
}
