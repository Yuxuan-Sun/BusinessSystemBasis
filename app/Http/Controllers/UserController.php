<?php

namespace App\Http\Controllers;

use App\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
//        return $user;
        $userInfo = UserInformation::where('user_id', '=',$user->id) -> get();

        return view('users.index',compact('userInfo'));
    }
}
