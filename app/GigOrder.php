<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GigOrder extends Model
{
    function user(){
        return $this->belongsTo('App\User');
    }

    function gig(){
        return $this->belongsTo('App\Gig');
    }
}
