<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    protected $fillable = ['firstName','lastName','email','password'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    function enrolled(){
        return $this->hasMany('App\EnrolledCourse');
    }
    function course(){
        return $this->hasMany('App\Course');
    }

    function gig(){
        return $this->hasMany('App\Gig');
    }
    function account(){
        return $this->hasOne('App\UserAccount');
    }
    function gig_order(){
        return $this->hasMany('App\GigOrder');
    }
}