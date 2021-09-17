<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carreras = Carrera::where('condicion', '1')->count();
        $estudiantes = Estudiante::count();
        $docentes = Docente::count();
        $users = User::count();
        $roles = Role::count();
        $user = User::all();
        $permisos = Permission::count();
        return view('layouts.dashboard', compact('estudiantes', 'docentes', 'carreras', 'users', 'roles', 'permisos', 'user'));
    }
}
