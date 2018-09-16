<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function course(){
        return $this->belongsTo('App\Course');
    }
}
