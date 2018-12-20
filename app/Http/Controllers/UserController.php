<?php

namespace App\Http\Controllers;

use App\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userInfo = UserInformation::where('user_id', '=',$user->id) -> get() -> first();

        return view('users.index',compact('userInfo'));
    }
}
