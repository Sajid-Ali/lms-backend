<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveCourse extends Model
{
    function user(){
        return $this->belongsTo('App\User');
    }
}
