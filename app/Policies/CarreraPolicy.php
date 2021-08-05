<?php

namespace App\Policies;

use App\Models\Carrera;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarreraPolicy
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
     * @param  \App\Models\Carrera  $carrera
     * @return mixed
     */
    public function view(User $user, Carrera $carrera)
    {
        return $user->hasPermissionTo('Ver carreras');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear carreras');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Carrera  $carrera
     * @return mixed
     */
    public function update(User $user, Carrera $carrera)
    {
        return $user->hasPermissionTo('Actualizar carreras');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Carrera  $carrera
     * @return mixed
     */
    public function delete(User $user, Carrera $carrera)
    {
        return $user->hasPermissionTo('Eliminar carreras');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Carrera  $carrera
     * @return mixed
     */
    public function restore(User $user, Carrera $carrera)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Carrera  $carrera
     * @return mixed
     */
    public function forceDelete(User $user, Carrera $carrera)
    {
        //
    }
}
