<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
  public function image(){
    return $this->hasMany('App\Image');
  }
  public function video(){
    return $this->hasMany('App\Video');
  }
  public function user(){
    return ($this->belongsTo('App\User'));
  }

  protected $fillable = [
    'course_name', 'description', 'price','isPublished'
];
}
