<?php

namespace App\Http\Controllers;

use App\UserInformation;
use App\resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userInfo = UserInformation::where('user_id', '=',$user->id) -> get() -> first();

        return view('users.index',compact('userInfo'));
    }

    public function resources() {
        $resources = DB::table('resources')->get();
        return view('users.publishedInformation.resources')->with('resources',$resources);

    }

    public function maps() {
        $maps = DB::table('maps')->get();
        return view('users.publishedInformation.maps')->with('maps',$maps);
    }
}
