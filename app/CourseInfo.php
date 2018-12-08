<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseInfo extends Model
{
    function course(){
        return $this->belongsTo('App\Course');
    }
}
