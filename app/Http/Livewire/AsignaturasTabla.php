<?php

namespace App\Http\Livewire;

use App\Models\Asignatura;
use App\Models\Prerequisito;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class AsignaturasTabla extends Component
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
        $pre=Prerequisito::
            join('asignaturas','asignaturas.id','=','prerequisitos.preasignatura_id')
            ->select(DB::raw("prerequisitos.asignatura_id,  GROUP_CONCAT(asignaturas.nombre Separator  ' | ') as prerequisitos"))
            ->groupBy('prerequisitos.asignatura_id');

        $asignaturas = Asignatura::
            leftJoinSub($pre,'pre',function($join){
                $join->on('pre.asignatura_id','=','asignaturas.id');
        })
            ->join('carreras','carreras.id','=','asignaturas.carrera_id')
            ->join('periodos','periodos.id','=','asignaturas.periodo_id')
            ->where('asignaturas.nombre','LIKE', "%{$this->search}%")
            ->orWhere('asignaturas.cod_asignatura', "%{$this->search}%")
            ->orWhere('carreras.nombre','LIKE', "%{$this->search}%")
            ->orWhere('periodos.nombre','LIKE', "%{$this->search}%")
            ->select('asignaturas.*','pre.prerequisitos as prerequisitos')
            ->latest('id')
            ->paginate($this->perPage);

        return view('livewire.asignaturas-tabla', compact('asignaturas'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
