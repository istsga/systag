<?php

namespace App\Policies;

use App\Models\Matricula;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatriculaPolicy
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
     * @param  \App\Models\Matricula  $matricula
     * @return mixed
     */
    public function view(User $user, Matricula $matricula)
    {
        return $user->dni === $matricula->estudiante_id || $user->hasPermissionTo('Ver matriculas');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear matriculas');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Matricula  $matricula
     * @return mixed
     */
    public function update(User $user, Matricula $matricula)
    {
        return $user->hasPermissionTo('Actualizar matriculas');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Matricula  $matricula
     * @return mixed
     */
    public function delete(User $user, Matricula $matricula)
    {
        return $user->hasPermissionTo('Eliminar matriculas');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Matricula  $matricula
     * @return mixed
     */
    public function restore(User $user, Matricula $matricula)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Matricula  $matricula
     * @return mixed
     */
    public function forceDelete(User $user, Matricula $matricula)
    {
        //
    }
}
