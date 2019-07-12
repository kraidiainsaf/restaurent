<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
    public function locale_commandes()
    {
        return $this->hasMany('App\Locale_Commande');
    }
}
