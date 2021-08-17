<?php

namespace App\Http\Controllers;

use App\Models\Paralelo;
use Illuminate\Http\Request;

class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Paralelo);
        $paralelos = Paralelo::all();
        return view('paralelos.index', compact('paralelos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Paralelo::class);
        return view('paralelos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Paralelo::class);
        $data= $request->validate([
            'nombre' => ['required', 'unique:paralelos', 'regex:/^[\pL\s\-]+$/u', 'max:1'],
        ]);
        Paralelo::create($data);
        return redirect()->route('paralelos.index')->with('status', 'Agregado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paralelo  $paralelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Paralelo $paralelo)
    {
        $this->authorize('update', $paralelo);
        return view('paralelos.edit', compact('paralelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paralelo  $paralelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paralelo $paralelo)
    {
        $this->authorize('update', $paralelo);
        $data= $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u|max:1|unique:paralelos,nombre,' . $paralelo->id,
         ]);

         $paralelo->update($data);
         return redirect()->route('paralelos.index')->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paralelo  $paralelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paralelo $paralelo)
    {
        $this->authorize('delete', $paralelo);
        $paralelo->delete();
        return redirect()->route('paralelos.index')->with('status', 'Eliminado con éxito');
    }
}
