<?php

namespace App\Http\Livewire;

use App\Models\Matricula;
use Livewire\Component;
use Livewire\WithPagination;

class MatriculasTabla extends Component
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
        $matriculas = Matricula::
                join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','matriculas.asignacione_id')
                ->join('periodacademicos','periodacademicos.id','=','asignacione_periodacademico.periodacademico_id')
                ->join('asignacione_carrera','asignacione_carrera.asignacione_id','=','matriculas.asignacione_id')
                ->join('asignaciones','asignaciones.id','=','matriculas.asignacione_id')
                ->join('periodos','periodos.id','=','asignaciones.periodo_id')
                ->join('carreras','carreras.id','=','asignacione_carrera.carrera_id')
                ->join('estudiantes','estudiantes.id','=','matriculas.estudiante_id')
                ->where('estudiantes.nombre','LIKE', "%{$this->search}%")
                ->Orwhere('estudiantes.apellido','LIKE', "%{$this->search}%")
                ->Orwhere('periodacademicos.periodo','LIKE', "%{$this->search}%")
                ->Orwhere('carreras.nombre','LIKE', "%{$this->search}%")
                ->Orwhere('periodos.nombre','LIKE', "%{$this->search}%")
                ->select('matriculas.*' )
                ->latest('id')
                ->paginate($this->perPage);
        return view('livewire.matriculas-tabla', compact('matriculas'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
