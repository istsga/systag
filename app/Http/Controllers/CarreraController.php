<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Http\Requests\CarreraStoreRequest;
use App\Http\Requests\CarreraUpdateRequest;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Carrera);
        $carreras = Carrera::latest('id')
            ->paginate();
        return view('carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Carrera::class);
        return view('carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarreraStoreRequest $request)
    {
        $this->authorize('create', Carrera::class);
        Carrera::create($request->validated());
        return redirect()->route('carreras.index')->with('status', 'Agregado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        $this->authorize('update', $carrera);
        return view('carreras.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(CarreraUpdateRequest $request, Carrera $carrera)
    {
        $this->authorize('update', $carrera);
        $carrera->update($request->validated());
        return redirect()->route('carreras.index')->with('status', 'Actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        $this->authorize('delete', $carrera);
        $carrera->delete();
        return redirect()->route('carreras.index')->with('status', 'Eliminado con éxito');
    }
}
