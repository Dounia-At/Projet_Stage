<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function materiaux()
    {
        return $this->hasMany('App\Materiel');
    }
    public function categories()
    {
        return $this->hasMany('App\Categorie');
    }
    public function fournisseurs()
    {
        return $this->hasMany('App\Fournisseur');
    }
    public function affectations()
    {
        return $this->hasMany('App\Affectation');
    }
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
