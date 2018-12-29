<?php

namespace App\Http\Controllers;

use App\Category;
use App\CourseModule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Video;

class MyCourseController extends Controller
{

    /*

    * create course

    */
    public function createCourse(Request $request)
    {
        $course = new Course();
        $course->image_cdnUrl = $request->image_cdnUrl;
        $course->course_name = $request->course_name;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->isPublished = $request->isPublished;
        $course->category_id = $request->category_id;
        $course->course_type_id = $request->course_type_id;
        $course->user_id = $request->user_id;
        $course->save();
        $courses = User::find($request->user_id)->course;
        return response()->json($courses);
    }

    /*

    * get all the created course

    */

    public function getAllCourses()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    public function getMyCourses($userId)
    {
        $courses = User::find($userId)->course;
        return response()->json($courses);
    }

    /*
     * Get courses of category category_id
     */

    public function getCourseOfCategory($category_id)
    {
        $courses = Category::find($category_id)->course;
        return response()->json($courses);
    }

    /*
    Upload videos for course
    */

    public function uploadCourseVideo(Request $req)
    {

        $video = new Video();
        $video->uuid = $req->uuid;
        $video->cdnUrl = $req->cdnUrl;
        $video->title = $req->title;
        $video->description = $req->description;
        $video->course_id = $req->course_id;
        $video->duration = $req->duration;
        if($req->checked){
            $courseModule = new CourseModule();
            $courseModule->module_name = $req->module;
            $courseModule->course_id = $req->course_id;
            $courseModule->save();
            $video->course_module_id = $courseModule->id;
        }else{
            $video->course_module_id = $req->module;
        }
        $video->save();
        $videos = Course::find($req->course_id)->video;
        $modules = Course::find($req->course_id)->course_module;
        return response()->json(compact('videos','modules'));
    }

    /*
get course videos in mycourse
*/

    public function getCourseVideos($courseId)
    {
        $videos = Course::find($courseId)->video;
        return response()->json($videos);
    }

    public function getThisCourse($id)
    {
        $course = Course::find($id);
        return response()->json($course);
    }

}
