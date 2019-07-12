<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Locale_commande extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function commande()
    {
        return $this->hasOne('App\Commande','id');
    }
    public function table()
    {
        return $this->belongsTo('App\Table');
    }
}
