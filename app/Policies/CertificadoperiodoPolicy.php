<?php

namespace App\Policies;

use App\Models\Certificadoperiodo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificadoperiodoPolicy
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
     * @param  \App\Models\Certificadoperiodo  $certificadoperiodo
     * @return mixed
     */
    public function view(User $user, Certificadoperiodo $certificadoperiodo)
    {
        return $user->hasPermissionTo('Ver certificados por periodo');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificadoperiodo  $certificadoperiodo
     * @return mixed
     */
    public function update(User $user, Certificadoperiodo $certificadoperiodo)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificadoperiodo  $certificadoperiodo
     * @return mixed
     */
    public function delete(User $user, Certificadoperiodo $certificadoperiodo)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificadoperiodo  $certificadoperiodo
     * @return mixed
     */
    public function restore(User $user, Certificadoperiodo $certificadoperiodo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificadoperiodo  $certificadoperiodo
     * @return mixed
     */
    public function forceDelete(User $user, Certificadoperiodo $certificadoperiodo)
    {
        //
    }
}
