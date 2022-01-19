<?php

namespace App\Policies;

use App\Models\Calificacione;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalificacionePolicy
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
     * @param  \App\Models\Calificacione  $calificacione
     * @return mixed
     */
    public function view(User $user, Calificacione $calificacione)
    {
        return $user->hasRole('Administrador') ||$user->hasPermissionTo('Ver calificaciones');
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
        //return $user->hasPermissionTo('Crear calificaciones');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Calificacione  $calificacione
     * @return mixed
     */
    public function update(User $user, Calificacione $calificacione)
    {
        return $user->hasRole('Docente');
        //return $user->hasPermissionTo('Actualizar calificaciones');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Calificacione  $calificacione
     * @return mixed
     */
    public function delete(User $user, Calificacione $calificacione)
    {
        return $user->hasRole('Docente');
        //return $user->hasPermissionTo('Eliminar calificaciones');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Calificacione  $calificacione
     * @return mixed
     */
    public function restore(User $user, Calificacione $calificacione)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Calificacione  $calificacione
     * @return mixed
     */
    public function forceDelete(User $user, Calificacione $calificacione)
    {
        //
    }
}
