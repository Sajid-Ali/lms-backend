<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    function user(){
        return $this->belongsTo('App\User');
    }

    function course(){
        return $this->belongsTo('App\Course');
    }
}
