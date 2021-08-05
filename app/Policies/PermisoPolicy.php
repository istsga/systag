<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermisoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \Spatie\permission\Models\Permission  $permission
     * @return mixed
     */
    public function view(User $user, Permission $permission)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Ver permisos');
    }
}
