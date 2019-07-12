<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->hasOne('App\User','id');
    }
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
    public function commandes()
    {
        return $this->hasMany('App\Commande');
    }
}
