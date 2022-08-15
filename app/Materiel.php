<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use SoftDeletes;
    protected $table = 'materiaux';
    protected $dates = ['deleted_at'];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
    public function fournisseur()
    {
        return $this->belongsTo('App\Fournisseur');
    }
    public function affectations()
    {
        return $this->hasMany('App\Affectation');
    }
}
