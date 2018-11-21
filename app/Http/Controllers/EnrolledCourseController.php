<?php

namespace App\Http\Controllers;

use App\UserAccount;
use Illuminate\Http\Request;
use App\User;
use App\EnrolledCourse;
use App\Course;
class EnrolledCourseController extends Controller
{
    function index(){
        $enrolledCourses = User::find(Auth::user()->id)->enrolledCourse;
        return response()->json(compact('enrolledCourses'));
    }

    function isUserEnrolled($courseId,$userId){
        $enrolledCourses = User::find($userId)->enrolled->where('course_id',$courseId);
        return response()->json($enrolledCourses);
    }
    function getEnrolledCourses($userId){
        $enrolledCourses = User::find($userId)->enrolled;
        $enrolled = [];
        foreach($enrolledCourses as $enroll){
            $course = Course::find($enroll->course_id);
            array_push($enrolled,$course);
        }
        return response()->json($enrolled);
    }

    function buyCourse(Request $request){
        \Stripe\Stripe::setApiKey("sk_test_cSBusN2Es6NJHXDmb1d92MHi");

        $token = $request->token;
        $price = (int) $request->price *100;
        $charge = \Stripe\Charge::create([
            'amount' => $price,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);
        $userAccount = User::find($request->owner_id)->account;
        if($charge){
            if($userAccount){
                $current = (int) $userAccount->balance;
                $current = $current + (int) $request->price;
                $userAccount->balance = $current;
                $userAccount->save();
            }else{
                $userAccount = new UserAccount();
                $userAccount->balance = $request->price;
                $userAccount->user_id = $request->owner_id;
                $userAccount->save();
            }

            $enroll = new EnrolledCourse();
            $enroll->course_id = $request->course_id;
            $enroll->user_id = $request->user_id;
            $enroll->save();
        }

        return response()->json($userAccount);

    }

    function enrollInCourse(Request $req){
        $enroll = new EnrolledCourse();
        $enroll->course_id = $req->course_id;
        $enroll->user_id = $req->user_id;
        $enroll->save();

        return response()->json($enroll);
    }
}
