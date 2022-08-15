<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public function affectations()
    {
        return $this->hasMany('App\Affectation');
    }
}
