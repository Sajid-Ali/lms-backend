<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseReview;
use Illuminate\Http\Request;

class CourseReviewController extends Controller
{
    function getCourseReview(Request $request){
        $course_review = CourseReview::all()->where('user_id',$request->user_id)->where('course_id',$request->course_id);
        return response()->json($course_review);
    }

    function setCourseReview(Request $request) {
        $course_review = CourseReview::find($request->id);
        if($course_review) {
            $course_review->like_status_id = $request->like_status_id;
            $course_review->user_id = $request->user_id;
            $course_review->course_id = $request->course_id;
            $course_review->review = $request->review;
            $course_review->save();
        } else{
            $course_review = new CourseReview();
            $course_review->like_status_id = $request->like_status_id;
            $course_review->user_id = $request->user_id;
            $course_review->course_id = $request->course_id;
            $course_review->review = $request->review;
            $course_review->save();
        }


        return response()->json($course_review);
    }

    function getAllReviews($courseId){
        $reviews = CourseReview::with('user')->get();
        return response()->json($reviews);
    }


}
