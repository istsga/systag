<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Periodo::class);
        $periodos = Periodo::all();
        return view('periodos.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Periodo::class);
        return view('periodos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Periodo::class);
        $data= $request->validate([
            'nombre' => [ 'required', 'unique:periodos', 'regex:/^[\pL\s\-]+$/u', 'string',  'min:5', 'max:20'],
        ]);

        Periodo::create($data);
        return redirect()->route('periodos.index')->with('status', 'Agregado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodo $periodo)
    {
        $this->authorize('update', $periodo);
        return view('periodos.edit', compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periodo $periodo)
    {
        $this->authorize('update', $periodo);
        $data =$request->validate([
            'nombre' => 'required|min:3|max:20|regex:/^[\pL\s\-]+$/u|unique:periodos,nombre,' . $periodo->id,
        ]);

        $periodo->update($data);
        return redirect()->route('periodos.index')->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodo $periodo)
    {
        $this->authorize('delete', $periodo);
        $periodo->delete();
        return redirect()->route('periodos.index')->with('status', 'Eliminado con éxito');
    }
}
