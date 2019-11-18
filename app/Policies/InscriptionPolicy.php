<?php

namespace App\Policies;

use App\User;
use App\inscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class InscriptionPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        //Return false to deny all authorization
        //return false;
    }

    /**
     * Determine whether the user can view any inscriptions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the inscription.
     *
     * @param  \App\User  $user
     * @param  \App\inscription  $inscription
     * @return mixed
     */
    public function view(User $user, inscription $inscription)
    {
        //
    }

    /**
     * Determine whether the user can create inscriptions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the inscription.
     *
     * @param  \App\User  $user
     * @param  \App\inscription  $inscription
     * @return mixed
     */
    public function update(User $user, inscription $inscription)
    {
        //dd($user->id . $inscription->user_id);
        return $user->id === $inscription->user_id;
    }

    /**
     * Determine whether the user can delete the inscription.
     *
     * @param  \App\User  $user
     * @param  \App\inscription  $inscription
     * @return mixed
     */
    public function delete(User $user, inscription $inscription)
    {
        //
    }

    /**
     * Determine whether the user can restore the inscription.
     *
     * @param  \App\User  $user
     * @param  \App\inscription  $inscription
     * @return mixed
     */
    public function restore(User $user, inscription $inscription)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the inscription.
     *
     * @param  \App\User  $user
     * @param  \App\inscription  $inscription
     * @return mixed
     */
    public function forceDelete(User $user, inscription $inscription)
    {
        //
    }
}
