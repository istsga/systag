<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTabla extends Component
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
        $users = User::where('users.dni','LIKE', "%{$this->search}%")
        ->orWhere('users.nombre','LIKE', "%{$this->search}%")
        ->orWhere('users.apellido','LIKE', "%{$this->search}%")
        ->orWhere('users.email','LIKE', "%{$this->search}%")
        ->latest('id')
        ->allowed()
        ->paginate($this->perPage);
        return view('livewire.users-tabla', compact('users'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
