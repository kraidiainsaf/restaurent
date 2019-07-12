<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function table()
    {
        return $this->belongsTo('App\Table');
    }
   
}
