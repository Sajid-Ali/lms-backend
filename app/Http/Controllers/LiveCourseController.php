<?php

namespace App\Http\Controllers;

use App\Course;
use App\LiveCourse;
use App\User;
use Illuminate\Http\Request;
use OpenTok\OpenTok;
use OpenTok\Role;
use phpDocumentor\Reflection\Types\Array_;


class LiveCourseController extends Controller
{
    /**
     *
     */
    function index($courseId)
    {

        $opentok = new OpenTok("46243812", "339276c7b6c2ce32d138508ed4458fe3af0433d8");
        $course = Course::find($courseId);
        $user = Course::find($courseId)->user;
        $trainerName = $user->firstName." ".$user->lastName;
        $sessionId = $course->session_id;
        // Set some options in a token
        $token = $opentok->generateToken($sessionId, array(
            'role'       => Role::MODERATOR,
            'expireTime' => time()+(7 * 24 * 60 * 60), // in one week
            'data'       => $trainerName
        ));

        return response()->json(compact('sessionId','token'));

    }

    function enrolledLiveCourse($courseId) {
        $opentok = new OpenTok("46243812", "339276c7b6c2ce32d138508ed4458fe3af0433d8");
        $course = Course::find($courseId);
        $user = Course::find($courseId)->user;
        $trainerName = $user->firstName." ".$user->lastName;
        $sessionId = $course->session_id;
        // Set some options in a token
        $token = $opentok->generateToken($sessionId, array(
            'role'       => Role::PUBLISHER,
            'expireTime' => time()+(7 * 24 * 60 * 60), // in one week
            'data'       => $trainerName
        ));

        return response()->json(compact('sessionId','token'));
    }

//    function isEnrolledUser($trainerid) {
//        $opentok = new OpenTok("46243812", "339276c7b6c2ce32d138508ed4458fe3af0433d8");
//
//        $sessionId = LiveCourse::all()->where('user_id',$trainerid)[0]->sessionId;
//
//        // Set some options in a token
//        $token = $opentok->generateToken($sessionId, array(
//            'role'       => Role::MODERATOR,
//            'expireTime' => time()+(7 * 24 * 60 * 60), // in one week
//            'data'       => $userId
//        ));
//
//        return response()->json(compact('sessionId','token'));
//    }
}
