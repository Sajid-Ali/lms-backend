<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPasswordRequest;
use App\ResetPassword;
use App\User;
use Illuminate\Http\Request;

class NewPasswordController extends Controller
{
    function setNewPassword(NewPasswordRequest $request)
    {
        return $this->getResetPasswordTableRow($request)->count() > 0 ? $this->changePassword($request) : $this->tokenNotFoundResponse($request);
    }

    private function getResetPasswordTableRow($request)
    {
        return ResetPassword::where(['email' => $request->email, 'token' => $request->resetToken]);
    }

    private function tokenNotFoundResponse()
    {
        return response()->json(['error' => 'Token or Email is incorrect']);
    }

    private function changePassword($request)
    {
        $user = User::whereEmail($request->email)->first();
        $this->getResetPasswordTableRow($request)->delete();
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['success' => 'password is changed successfully']);

    }
}
