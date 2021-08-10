<?php

namespace App\Policies;

use App\Models\Suspenso;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuspensoPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole('Docente'))
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
     * @param  \App\Models\Suspenso  $suspenso
     * @return mixed
     */
    public function view(User $user, Suspenso $suspenso)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Ver suspensos');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Docente');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suspenso  $suspenso
     * @return mixed
     */
    public function update(User $user, Suspenso $suspenso)
    {
        return $user->hasRole('Docente');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suspenso  $suspenso
     * @return mixed
     */
    public function delete(User $user, Suspenso $suspenso)
    {
        return $user->hasRole('Docente');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suspenso  $suspenso
     * @return mixed
     */
    public function restore(User $user, Suspenso $suspenso)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suspenso  $suspenso
     * @return mixed
     */
    public function forceDelete(User $user, Suspenso $suspenso)
    {
        //
    }
}
