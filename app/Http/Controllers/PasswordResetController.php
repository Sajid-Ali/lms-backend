<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\ResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function resetPassword(Request $request){

        if(!$this->validateEmail($request->email)){
            return $this->failedResponse();
        }

        $this->sendEmail($request->email);

        return $this->successResponse();
    }

    function validateEmail($email){
        return !!User::where('email',$email)->first();
    }

    function failedResponse(){
        return response()->json([
            'error' => 'Email doesn\'t exist on our system'
        ]);
    }

    function sendEmail($email){
        $token = $this->createToken($email);
        Mail::to($email)->send(new ResetPasswordMail($token));
    }

    function createToken($email){
        $oldToken = ResetPassword::all()->where('email',$email)->first();
        if($oldToken){
            return $oldToken->token;
        }
        $token = str_random(60);
        $this->saveToken($token,$email);

        return $token;
    }

    function saveToken($token,$email){
        $resetPassword = new ResetPassword();
        $resetPassword->email = $email;
        $resetPassword->token = $token;
        $resetPassword->save();
    }

    function successResponse(){
        return response()->json(
            [
                'success' => 'We have sent an email please check your email for further instructions'
            ]
        );
    }
}
