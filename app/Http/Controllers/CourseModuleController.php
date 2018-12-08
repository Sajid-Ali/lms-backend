<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseModule;
use Illuminate\Http\Request;

class CourseModuleController extends Controller
{
    function index($id){
        $modules = Course::find($id)->course_module;
        return response()->json($modules);
    }
}
