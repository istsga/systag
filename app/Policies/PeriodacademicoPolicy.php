<?php

namespace App\Policies;

use App\Models\Periodacademico;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeriodacademicoPolicy
{
    use HandlesAuthorization;

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
     * @param  \App\Models\Periodacademico  $periodacademico
     * @return mixed
     */
    public function view(User $user, Periodacademico $periodacademico)
    {
        return $user->hasPermissionTo('Ver periodos academicos');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear periodos academicos');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Periodacademico  $periodacademico
     * @return mixed
     */
    public function update(User $user, Periodacademico $periodacademico)
    {
        return $user->hasPermissionTo('Actualizar periodos academicos');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Periodacademico  $periodacademico
     * @return mixed
     */
    public function delete(User $user, Periodacademico $periodacademico)
    {
        return $user->hasPermissionTo('Eliminar periodos academicos');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Periodacademico  $periodacademico
     * @return mixed
     */
    public function restore(User $user, Periodacademico $periodacademico)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Periodacademico  $periodacademico
     * @return mixed
     */
    public function forceDelete(User $user, Periodacademico $periodacademico)
    {
        //
    }
}
