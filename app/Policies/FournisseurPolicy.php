<?php

namespace App\Policies;

use App\User;
use App\Fournisseur;
use Illuminate\Auth\Access\HandlesAuthorization;

class FournisseurPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the fournisseur.
     *
     * @param  \App\User  $user
     * @param  \App\Fournisseur  $fournisseur
     * @return mixed
     */

    public function before($user, $ability)
    {
        if($user->is_admin ) return true;
    }

    public function view(User $user, Fournisseur $fournisseur)
    {
        return true;        
    }

    /**
     * Determine whether the user can create fournisseurs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;        
    }

    /**
     * Determine whether the user can update the fournisseur.
     *
     * @param  \App\User  $user
     * @param  \App\Fournisseur  $fournisseur
     * @return mixed
     */
    public function update(User $user, Fournisseur $fournisseur)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the fournisseur.
     *
     * @param  \App\User  $user
     * @param  \App\Fournisseur  $fournisseur
     * @return mixed
     */
    public function delete(User $user, Fournisseur $fournisseur)
    {
        return false;
    }
}
