<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use Illuminate\Http\Request;

class SeccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Seccione);
        $secciones = Seccione::all();
        return view('secciones.index', compact('secciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Seccione::class);
        return view('secciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Seccione::class);
        $data= $request->validate([
            'nombre' => ['required', 'unique:secciones', 'regex:/^[\pL\s\-]+$/u', 'string',  'min:3', 'max:30'],
        ]);

        Seccione::create($data);
        return redirect()->route('secciones.index')->with('status', 'Agregado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seccione  $seccione
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccione $seccione)
    {
        $this->authorize('update', $seccione);
        return view('secciones.edit', compact('seccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seccione  $seccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seccione $seccione)
    {
        $this->authorize('update', $seccione);
        $data= $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:30|unique:secciones,nombre,' . $seccione->id,
         ]);

         $seccione->update($data);
         return redirect()->route('secciones.index')->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seccione  $seccione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccione $seccione)
    {
        $this->authorize('delete', $seccione);
        $seccione->delete();
        return redirect()->route('secciones.index')->with('status', 'Eliminado con éxito');
    }
}
