<?php

namespace App\Http\Livewire;

use App\Models\Docente;
use Livewire\Component;
use Livewire\WithPagination;

class DocentesTabla extends Component
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

        $docentes = Docente::
              where('docentes.dni','LIKE', "%{$this->search}%")
            ->orWhere('docentes.nombre','LIKE', "%{$this->search}%")
            ->orWhere('docentes.email','LIKE', "%{$this->search}%")
            ->latest('id')
            ->allowed()
            ->paginate($this->perPage);
        return view('livewire.docentes-tabla', compact('docentes'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
