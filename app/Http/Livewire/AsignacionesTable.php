<?php

namespace App\Http\Livewire;

use App\Models\Asignacione;
use Livewire\Component;
use Livewire\WithPagination;

class AsignacionesTable extends Component
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
        $asignaciones = Asignacione::
            join('asignacione_periodacademico','asignacione_periodacademico.asignacione_id','=','asignaciones.id')
            ->join('periodacademicos', 'periodacademicos.id', '=', 'asignacione_periodacademico.periodacademico_id' )
            ->join('asignacione_carrera','asignacione_carrera.asignacione_id','=','asignaciones.id')
            ->join('carreras','carreras.id','=','asignacione_carrera.carrera_id')
            ->join('periodos','periodos.id','=','asignaciones.periodo_id')
                ->Orwhere('periodacademicos.periodo','LIKE', "%{$this->search}%")
                ->Orwhere('carreras.nombre','LIKE', "%{$this->search}%")
                ->Orwhere('periodos.nombre','LIKE', "%{$this->search}%")
                ->select('asignaciones.*')
                ->latest('id')
                ->paginate($this->perPage);
        return view('livewire.asignaciones-table', compact('asignaciones'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
