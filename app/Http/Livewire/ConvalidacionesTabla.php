<?php

namespace App\Http\Livewire;

use App\Models\Convalidacione;
use Livewire\Component;
use Livewire\WithPagination;

class ConvalidacionesTabla extends Component
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
        $convalidaciones = Convalidacione::
        join('estudiantes','estudiantes.id','=','convalidaciones.estudiante_id')
            ->join('asignaturas','asignaturas.id','=','convalidaciones.asignatura_id')
            ->where('estudiantes.nombre','LIKE', "%{$this->search}%")
            ->Orwhere('estudiantes.apellido','LIKE', "%{$this->search}%")
            ->Orwhere('asignaturas.nombre','LIKE', "%{$this->search}%")
            ->select('convalidaciones.*')
            ->latest('id')
            ->paginate($this->perPage);
        return view('livewire.convalidaciones-tabla', compact('convalidaciones'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
