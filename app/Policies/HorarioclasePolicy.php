<?php

namespace App\Policies;

use App\Models\Horarioclase;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HorarioclasePolicy
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
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Horarioclase  $horarioclase
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Horarioclase $horarioclase)
    {
        return $user->id === $user->id || $user->hasPermissionTo('Ver horario de clases');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Horarioclase  $horarioclase
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Horarioclase $horarioclase)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Horarioclase  $horarioclase
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Horarioclase $horarioclase)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Horarioclase  $horarioclase
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Horarioclase $horarioclase)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Horarioclase  $horarioclase
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Horarioclase $horarioclase)
    {
        //
    }
}
