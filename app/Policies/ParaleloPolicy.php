<?php

namespace App\Policies;

use App\Models\Paralelo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParaleloPolicy
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
     * @param  \App\Models\Paralelo  $paralelo
     * @return mixed
     */
    public function view(User $user, Paralelo $paralelo)
    {
        return $user->hasPermissionTo('Ver paralelos');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear paralelos');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paralelo  $paralelo
     * @return mixed
     */
    public function update(User $user, Paralelo $paralelo)
    {
        return $user->hasPermissionTo('Actualizar paralelos');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paralelo  $paralelo
     * @return mixed
     */
    public function delete(User $user, Paralelo $paralelo)
    {
        return $user->hasPermissionTo('Eliminar paralelos');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paralelo  $paralelo
     * @return mixed
     */
    public function restore(User $user, Paralelo $paralelo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paralelo  $paralelo
     * @return mixed
     */
    public function forceDelete(User $user, Paralelo $paralelo)
    {
        //
    }
}
