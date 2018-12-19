<?php

namespace App\Http\Controllers;

use App\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $userInfo = UserInformation::where(user_id,$user_id)->description;

        return view('users.index',compact($userInfo));
    }
}
