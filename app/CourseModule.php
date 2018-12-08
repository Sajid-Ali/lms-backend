<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseModule extends Model
{
    //

    public function video(){
        return $this->hasMany('App\Video');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }
}
