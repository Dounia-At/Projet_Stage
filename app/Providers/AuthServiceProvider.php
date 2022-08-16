<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Employee' => 'App\Policies\EmployeePolicy',
        'App\Fournisseur' => 'App\Policies\FournisseurPolicy',
        'App\Categorie' => 'App\Policies\CategoriePolicy',
        'App\Materiel' => 'App\Policies\MaterielPolicy',
        'App\Affectation' => 'App\Policies\AffectationPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
