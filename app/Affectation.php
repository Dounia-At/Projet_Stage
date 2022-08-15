<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
    public function materiel()
    {
        return $this->belongsTo('App\Materiel');
    }
}
