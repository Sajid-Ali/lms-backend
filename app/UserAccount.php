<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    function user(){
        return $this->belongsTo('App\User');
    }
}
