<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employé extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->hasOne('App\User','id');
    }
}
