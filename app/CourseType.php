<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    function course(){
        return $this->hasMany('App\Course');
    }
}
