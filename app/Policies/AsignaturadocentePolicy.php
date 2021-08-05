<?php

namespace App\Policies;

use App\Models\Asignaturadocente;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AsignaturadocentePolicy
{
    use HandlesAuthorization;

    public function before($user)
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
     * @param  \App\Models\Asignaturadocente  $asignaturadocente
     * @return mixed
     */
    public function view(User $user, Asignaturadocente $asignaturadocente)
    {
        return $user->dni === $asignaturadocente->docente_id ||  $user->hasPermissionTo('Ver distributivos');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear distributivos');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignaturadocente  $asignaturadocente
     * @return mixed
     */
    public function update(User $user, Asignaturadocente $asignaturadocente)
    {
        return $user->hasPermissionTo('Actualizar distributivos');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignaturadocente  $asignaturadocente
     * @return mixed
     */
    public function delete(User $user, Asignaturadocente $asignaturadocente)
    {
        return $user->hasPermissionTo('Eliminar distributivos');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignaturadocente  $asignaturadocente
     * @return mixed
     */
    public function restore(User $user, Asignaturadocente $asignaturadocente)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignaturadocente  $asignaturadocente
     * @return mixed
     */
    public function forceDelete(User $user, Asignaturadocente $asignaturadocente)
    {
        //
    }
}
