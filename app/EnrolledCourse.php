<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrolledCourse extends Model
{
    function user(){
        return $this->belongsTo('App\User');
    }

    function course(){
        return $this->hasMany('App\Course');
    }
}
