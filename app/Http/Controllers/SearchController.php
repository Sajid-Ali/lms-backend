<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function index($term){
        $courses = Course::where('course_name', 'like', $term . '%')->get();
        $users = User::where('firstName','like',$term . '%')->orWhere('lastName','like',$term . '%')->get();
        return response()->json([$courses,$users]);
    }
}
