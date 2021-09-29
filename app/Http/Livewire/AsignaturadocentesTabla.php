<?php

namespace App\Http\Livewire;

use App\Models\Asignaturadocente;
use Livewire\Component;
use Livewire\WithPagination;

class AsignaturadocentesTabla extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except'=> ''],
        'perPage' =>['except'=> '10']
    ];
    public $search = '';
    public $perPage = '10';

    public function render()
    {
        $asignaturadocentes = Asignaturadocente::
            join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignatura_docente.asignacione_id')
            ->join('periodacademicos','periodacademicos.id','=','asignacione_periodacademico.periodacademico_id')
            ->join('asignacione_carrera','asignacione_carrera.asignacione_id','=','asignatura_docente.asignacione_id')
            ->join('carreras','carreras.id','=','asignacione_carrera.carrera_id')
            ->join('docentes','docentes.id','=','asignatura_docente.docente_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_docente.asignatura_id')
            ->select('asignatura_docente.*','docentes.nombre', 'docentes.apellido', 'asignaturas.nombre as asignatura_nombre')
            ->where('docentes.nombre','LIKE', "%{$this->search}%")
            ->Orwhere('docentes.apellido','LIKE', "%{$this->search}%")
            ->Orwhere('asignaturas.nombre','LIKE', "%{$this->search}%")
            ->Orwhere('periodacademicos.periodo','LIKE', "%{$this->search}%")
            ->Orwhere('carreras.nombre','LIKE', "%{$this->search}%")
            ->latest('asignatura_docente.id')
            ->allowed()
            ->paginate($this->perPage);
        return view('livewire.asignaturadocentes-tabla', compact('asignaturadocentes'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
