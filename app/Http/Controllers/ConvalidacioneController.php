<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvalidacioneStoreRequest;
use App\Http\Requests\ConvalidacioneUpdateRequest;
use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Convalidacione;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Requests\CovalidacioneStoreRequest;

class ConvalidacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Convalidacione);

        return view('convalidaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Convalidacione::class);
        $estudiantes = Estudiante::all();
        $asignaturas = Asignatura::all();
        $carreras = Carrera::where('condicion', 1)->get();
        return view('convalidaciones.create', compact('estudiantes', 'asignaturas', 'carreras'));
    }

    public function getConvalidaciones($id)
    {
        $convalidacion = Asignatura::where('carrera_id', $id)->get();
        return $convalidacion;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConvalidacioneStoreRequest $request)
    {
        $this->authorize('create', Convalidacione::class);
        $asignatura=$request->get('Asignatura');
        $promedio=$request->get('Promedio');
        $i=0;
        while($i<count($asignatura)){
            $convalidacion=new Convalidacione;
            $convalidacion->estudiante_id=$request->get('estudiante_id');
            $convalidacion->asignatura_id=$asignatura[$i];
            $convalidacion->nota_final=$promedio[$i];
            $convalidacion->save();
            $i++;
        }
        return redirect()->route('convalidaciones.index')->with('status', 'Agregado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convalidacione  $convalidacione
     * @return \Illuminate\Http\Response
     */
    public function show(Convalidacione $convalidacione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convalidacione  $convalidacione
     * @return \Illuminate\Http\Response
     */
    public function edit(Convalidacione $convalidacione)
    {
        $this->authorize('update', $convalidacione);
        $estudiantes = Estudiante::all();
        $asignaturas = Asignatura::all();
        $carreras = Carrera::where('condicion', 1)->get();
        return view('convalidaciones.edit', compact('convalidacione','estudiantes', 'asignaturas', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convalidacione  $convalidacione
     * @return \Illuminate\Http\Response
     */
    public function update(ConvalidacioneUpdateRequest $request, Convalidacione $convalidacione)
    {
        $this->authorize('update', $convalidacione);
        $convalidacione->update($request->validated());
        return redirect()->route('convalidaciones.index')->with('status', 'Agregado con éxito.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convalidacione  $convalidacione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convalidacione $convalidacione)
    {
        $this->authorize('delete', $convalidacione);
        $convalidacione->delete();
        return redirect()->route('convalidaciones.index')->with('status', 'Eliminado con éxito');
    }
}
