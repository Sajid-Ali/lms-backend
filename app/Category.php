<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function course(){
        return $this->hasMany('App\Course');
    }

    function gig(){
        return $this->hasMany('App\Gig');
    }
}
