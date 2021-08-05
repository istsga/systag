<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RoleGlobalRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Role);
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $role = new Role);
        return view('roles.create',[
            'role'=> $role,
            'permissions' => Permission::pluck('name', 'id')
           ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleGlobalRequest $request)
    {
        $this->authorize('create', new Role);
        $role = Role::create($request->validated());
        $role->givePermissionTo($request->permissions);
        return redirect()->route('roles.index')->with('status', 'Agregado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleGlobalRequest $request, Role $role)
    {
        $this->authorize('update', $role);
        $role->update($request->validated());
        //Quitar permisos
        $role->permissions()->detach();
        //Agregar permisos
        $role->givePermissionTo($request->permissions);
        return redirect()->route('roles.index', $role)->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();
        return redirect()->route('roles.index', $role)->with('status', 'Eliminado con éxito');
    }
}
