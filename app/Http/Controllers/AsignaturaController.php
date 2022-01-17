<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AsignaturaStoreRequest;
use App\Http\Requests\AsignaturaUpdateRequest;
use App\Models\Prerequisito;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Asignatura);

        return view('asignaturas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Asignatura::class);
        $carreras = Carrera::where('condicion', 1)->get();
        $periodos = Periodo::all();
        $asignaturas = [];
        return view('asignaturas.create', compact('carreras', 'periodos', 'asignaturas'));
    }

    public function getPrerequisitos($id)
    {
        $prerequisitos = Asignatura::where('carrera_id', $id)->get();
        return $prerequisitos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignaturaStoreRequest $request)
    {
        $this->authorize('create', Asignatura::class);
        $asignatura = Asignatura::create($request->validated());

        $preasignatura=$request->get('preasignatura_id');
        if($preasignatura)
            for ($i=0; $i < count($preasignatura); $i++) {
                $pre  = new Prerequisito();
                $pre->asignatura_id = $asignatura->id;
                $pre->preasignatura_id = $preasignatura[$i];
                $pre->save();
            }

        return redirect()->route('asignaturas.index')->with('status', 'Agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {

        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        $this->authorize('update', $asignatura);
        $carreras = Carrera::where('condicion', 1)->get();
        $periodos = Periodo::all();
        $asignaturas = Asignatura::all();
        return view('asignaturas.edit', compact('asignatura', 'carreras', 'periodos', 'asignaturas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(AsignaturaUpdateRequest $request, Asignatura $asignatura)
    {
        $this->authorize('update', $asignatura);
        $asignatura->update($request->validated());

        $pre=Prerequisito::where('asignatura_id',$asignatura->id)->delete();
        $preasignatura=$request->get('preasignatura_id');
        if($preasignatura)
            for ($i=0; $i < count($preasignatura); $i++) {
                $pre  = new Prerequisito();
                $pre->asignatura_id = $asignatura->id;
                $pre->preasignatura_id = $preasignatura[$i];
                $pre->save();
            }
        return redirect()->route('asignaturas.index')->with('status', 'Actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        $this->authorize('delete', $asignatura);
        $asignatura->delete();
        return redirect()->route('asignaturas.index')->with('status', 'Eliminado con éxito');
    }
}
