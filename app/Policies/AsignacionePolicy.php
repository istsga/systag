<?php

namespace App\Policies;

use App\Models\Asignacione;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AsignacionePolicy
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
     * @param  \App\Models\Asignacione  $asignacione
     * @return mixed
     */
    public function view(User $user, Asignacione $asignacione)
    {
        return $user->hasPermissionTo('Ver asignaciones');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear asignaciones');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignacione  $asignacione
     * @return mixed
     */
    public function update(User $user, Asignacione $asignacione)
    {
        return $user->hasPermissionTo('Actualizar asignaciones');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignacione  $asignacione
     * @return mixed
     */
    public function delete(User $user, Asignacione $asignacione)
    {
        return $user->hasPermissionTo('Eliminar asignaciones');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignacione  $asignacione
     * @return mixed
     */
    public function restore(User $user, Asignacione $asignacione)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignacione  $asignacione
     * @return mixed
     */
    public function forceDelete(User $user, Asignacione $asignacione)
    {
        //
    }
}
