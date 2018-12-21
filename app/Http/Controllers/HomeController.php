<?php

namespace App\Http\Controllers;

use App\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->id !== NULL) {


            if ($user->init == 0) {

                $userInfo = new UserInformation();
                $userInfo->user_id = $user->id;
                $userInfo->description = '';
                $userInfo->money = '100';
                $userInfo->save();

                DB::table('users')->update(['init'=> 1]);

            }
            return redirect('/users/index');
        }

        return view('home');
    }
}
