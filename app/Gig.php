<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    function category(){
        return $this->belongsTo('App\Category');
    }

    function user(){
        return $this->belongsTo('App\User');
    }

    function gig_order(){
        return $this->hasMany('App\GigOrder');
    }
}
