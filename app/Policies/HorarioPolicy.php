<?php

namespace App\Policies;

use App\Models\Horario;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HorarioPolicy
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
     * @param  \App\Models\Horario  $horario
     * @return mixed
     */
    public function view(User $user, Horario $horario)
    {
        return $user->hasPermissionTo('Ver horarios');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear horarios');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Horario  $horario
     * @return mixed
     */
    public function update(User $user, Horario $horario)
    {
        return $user->hasPermissionTo('Actualizar horarios');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Horario  $horario
     * @return mixed
     */
    public function delete(User $user, Horario $horario)
    {
        return $user->hasPermissionTo('Eliminar horarios');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Horario  $horario
     * @return mixed
     */
    public function restore(User $user, Horario $horario)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Horario  $horario
     * @return mixed
     */
    public function forceDelete(User $user, Horario $horario)
    {
        //
    }
}
