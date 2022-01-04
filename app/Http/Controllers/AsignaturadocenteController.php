<?php

namespace App\Http\Controllers;

use App\Models\Asignacione;
use App\Models\Asignacione_carrera;
use App\Models\Asignacione_periodo;
use App\Models\Asignatura;
use App\Models\Asignaturadocente;
use App\Models\Docente;
use App\Models\Periodacademico;
use Illuminate\Http\Request;

class AsignaturadocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('asignaturadocentes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturadocente = new Asignaturadocente;
        $this->authorize('create', $asignaturadocente);

        $asignaturadocentes = Asignaturadocente::all();
        //definir asignciones que pertenezcan al ultimo periodo academico
        $per_aca=Periodacademico::orderBy('id','desc')->first();
        $asignaciones=Asignacione::
            join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
            ->where('asignacione_periodacademico.periodacademico_id',$per_aca->id)
            ->get();
        //dd($asignaciones);
        $asignaturas = [];
        $docentes = Docente::all();
        return view('asignaturadocentes.create', compact('asignaturadocentes', 'asignaciones', 'asignaturas', 'docentes'));


    }


    public function getAsignaturasdis($id)
    {
        $asignacione_carrera=Asignacione_carrera::
            where('asignacione_id',$id)
            ->first();
        $asignacion=Asignacione::
            where('id',$id)
            ->first();
        $asignaturaYaAsignada=Asignaturadocente::
            select('asignatura_id')
            ->where('asignacione_id',$id)
            ->get()->toArray();

        $asignaturas = Asignatura::
            where('carrera_id', $asignacione_carrera->carrera_id)
            ->where('periodo_id',$asignacion->periodo_id)
            ->whereNotIn('id',$asignaturaYaAsignada)
            ->get();

        return $asignaturas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Asignaturadocente);
        $data= $request->validate([
            'asignacione_id' => ['required'],
            'asignatura_id'=>['required'],
            'docente_id'=>['required'],
        ]);

        $asignaturadocente = Asignaturadocente::create($data);
        return redirect()->route('asignaturadocentes.index', $asignaturadocente)->with('status', 'Agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignaturadocente $asignaturadocente)
    {
        $this->authorize('update', $asignaturadocente);
        $asignaciones=Asignacione::all();
        $asignaturas = Asignatura::all();
        $docentes = Docente::all();
        return view('asignaturadocentes.edit', compact(
            'asignaturadocente', 'asignaciones', 'asignaturas', 'docentes'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignaturadocente $asignaturadocente)
    {
        $this->authorize('update', $asignaturadocente);
        $data= $request->validate([
            'asignacione_id' => ['required'],
            'asignatura_id'=>['required'],
            'docente_id'=>['required'],
        ]);
        $asignaturadocente->update($data);
        return redirect()->route('asignaturadocentes.index', $asignaturadocente)->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignaturadocente $asignaturadocente)
    {
        $this->authorize('delete', $asignaturadocente);
        $asignaturadocente->delete();
        return redirect()->route('asignaturadocentes.index')->with('status', 'Eliminado con éxito');
    }
}
