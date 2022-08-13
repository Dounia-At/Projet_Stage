<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function materiaux()
    {
        return $this->hasMany('App\Materiel');
    }
}
