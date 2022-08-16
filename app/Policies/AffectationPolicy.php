<?php

namespace App\Policies;

use App\User;
use App\Affectation;
use Illuminate\Auth\Access\HandlesAuthorization;

class AffectationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the affectation.
     *
     * @param  \App\User  $user
     * @param  \App\Affectation  $affectation
     * @return mixed
     */

    public function before($user, $ability)
    {
        if($user->is_admin ) return true;
    }

    public function view(User $user, Affectation $affectation)
    {
        return true;
    }

    /**
     * Determine whether the user can create affectations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the affectation.
     *
     * @param  \App\User  $user
     * @param  \App\Affectation  $affectation
     * @return mixed
     */
    public function update(User $user, Affectation $affectation)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the affectation.
     *
     * @param  \App\User  $user
     * @param  \App\Affectation  $affectation
     * @return mixed
     */
    public function delete(User $user, Affectation $affectation)
    {
        return false;
    }
}
