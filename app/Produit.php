<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function commandes()
    {
        return $this->belongsToMany('App\Commande');
    }
}
