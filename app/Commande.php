<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Commande extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function locale_commande()
    {
        return $this->hasOne('App\Locale_commande','id');
    }
    public function web_commande()
    {
        return $this->hasOne('App\Web_commande','id');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function ticket()
    {
        return $this->hasOne('App\Ticket','id');
    }
    public function produits()
    {
        return $this->belongsToMany('App\Produit')
        ->withPivot( 'quantité')
    	->withTimestamps();
    }
}
