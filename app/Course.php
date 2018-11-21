<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'course_name', 'description', 'price', 'isPublished'
    ];

    public function image()
    {
        return $this->hasMany('App\Image');
    }

    public function video()
    {
        return $this->hasMany('App\Video');
    }

    public function user()
    {
        return ($this->belongsTo('App\User'));
    }


    function enrolledCourse()
    {
        return $this->belongsTo('App\EnrolledCourse');
    }

    function category()
    {
        return $this->belongsTo('App\Category');
    }

}
