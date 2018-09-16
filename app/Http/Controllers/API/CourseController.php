<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Image;
class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        return response()->json(compact('courses'));
    }

    public function create(){
        $validator = Validator::make($request->all(), [ 
            'course_name' => 'required', 
            'description' => 'required', 
            'price' => 'required', 
            'isPublished' => 'required',
            'image'=>'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $image = new Image();
        $image_name = 
        

        
        $course = new Course();
        $course->course_name = Request()->course_name;
        $course->description = Request()->description;
        $course->price = Request()->price;
        $course->isPublished = Request()->isPublished;
        
    }
}
