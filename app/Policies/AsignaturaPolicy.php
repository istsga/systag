<?php

namespace App\Policies;

use App\Models\Asignatura;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AsignaturaPolicy
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
     * @param  \App\Models\Asignatura  $asignatura
     * @return mixed
     */
    public function view(User $user, Asignatura $asignatura)
    {
        return $user->hasPermissionTo('Ver asignaturas');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear asignaturas');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignatura  $asignatura
     * @return mixed
     */
    public function update(User $user, Asignatura $asignatura)
    {
        return $user->hasPermissionTo('Actualizar asignaturas');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignatura  $asignatura
     * @return mixed
     */
    public function delete(User $user, Asignatura $asignatura)
    {
        return $user->hasPermissionTo('Eliminar asignaturas');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignatura  $asignatura
     * @return mixed
     */
    public function restore(User $user, Asignatura $asignatura)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Asignatura  $asignatura
     * @return mixed
     */
    public function forceDelete(User $user, Asignatura $asignatura)
    {
        //
    }
}
