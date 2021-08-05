<?php

namespace App\Policies;

use App\Models\Convalidacione;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConvalidacionePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole('Administrador'))
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Convalidacione  $convalidacione
     * @return mixed
     */
    public function view(User $user, Convalidacione $convalidacione)
    {
        return $user->hasPermissionTo('Ver convalidaciones');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear convalidaciones');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Convalidacione  $convalidacione
     * @return mixed
     */
    public function update(User $user, Convalidacione $convalidacione)
    {
        return $user->hasPermissionTo('Actualizar convalidaciones');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Convalidacione  $convalidacione
     * @return mixed
     */
    public function delete(User $user, Convalidacione $convalidacione)
    {
        return $user->hasPermissionTo('Eliminar convalidaciones');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Convalidacione  $convalidacione
     * @return mixed
     */
    public function restore(User $user, Convalidacione $convalidacione)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Convalidacione  $convalidacione
     * @return mixed
     */
    public function forceDelete(User $user, Convalidacione $convalidacione)
    {
        //
    }
}
