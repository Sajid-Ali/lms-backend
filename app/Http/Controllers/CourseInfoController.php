<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseInfo;
use Illuminate\Http\Request;

class CourseInfoController extends Controller
{
    function createCourseInfo(Request $req)
    {

        $info = CourseInfo::find($req->id);

        if ($info) {
            $info->wywl = $req->wywl;
            $info->description = $req->description;
            $info->save();
        } else {
            $info = new CourseInfo();
            $info->wywl = $req->wywl;
            $info->description = $req->description;
            $info->course_id = $req->courseId;
            $info->save();
        }
    }

    function getCourseInfo($courseId)
    {
        $courseInfo = Course::find($courseId)->course_info;
        return response()->json($courseInfo);
    }
}
