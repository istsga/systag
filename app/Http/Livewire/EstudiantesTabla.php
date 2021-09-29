<?php

namespace App\Http\Livewire;

use App\Models\Estudiante;
use Livewire\Component;
use Livewire\WithPagination;

class EstudiantesTabla extends Component
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
        $estudiantes = Estudiante::
            where('estudiantes.dni','LIKE', "%{$this->search}%")
            ->orWhere('estudiantes.email','LIKE', "%{$this->search}%")
            ->orWhere('estudiantes.nombre','LIKE', "%{$this->search}%")
            ->orWhere('estudiantes.apellido','LIKE', "%{$this->search}%")
            ->latest('id')
            ->allowed()
            ->paginate($this->perPage);
        return view('livewire.estudiantes-tabla', compact('estudiantes'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
