<?php

namespace App\Http\Controllers;

use App\UserAccount;
use Illuminate\Http\Request;
use App\User;
class UserAccountController extends Controller
{
    function getBalance($id){
        $account = User::find($id)->account;
        if($account)
            return response()->json($account->balance);

        return response()->json(false);
    }
}
