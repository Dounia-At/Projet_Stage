<?php

namespace App\Policies;

use App\User;
use App\Materiel;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaterielPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the materiel.
     *
     * @param  \App\User  $user
     * @param  \App\Materiel  $materiel
     * @return mixed
     */

    public function before($user, $ability)
    {
        if($user->is_admin ) return true;
    }

    public function view(User $user, Materiel $materiel)
    {
        return true;
    }

    /**
     * Determine whether the user can create materiels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the materiel.
     *
     * @param  \App\User  $user
     * @param  \App\Materiel  $materiel
     * @return mixed
     */
    public function update(User $user, Materiel $materiel)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the materiel.
     *
     * @param  \App\User  $user
     * @param  \App\Materiel  $materiel
     * @return mixed
     */
    public function delete(User $user, Materiel $materiel)
    {
        return false;
    }
}
