<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function commande()
    {
        return $this->hasOne('App\Commande','id');
    }
}
