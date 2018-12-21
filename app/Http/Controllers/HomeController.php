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
                $userInfo->user_name = $user->name;
                $userInfo->description = '<br>  我的矿场：<br>
	    矿场名称：当前财年开采计划<br><br>

  我的矿石：<br>
	    硅石：<br>
	    钢铁：<br>
	    黄金：<br><br>

  我的加工厂：<br>
	    加工厂名称：类型<br><br>

  我的产品：<br>
	    手机：<br>
	    汽车：<br>
	    珠宝：<br><br>

  我的运输业：<br>
	    飞机名称：<br>
	    铁路名称：<br>

  我的科技树：<br>
	    中型采矿精通：未开通<br>
	    大型采矿精通：未开通<br>
	    中型加工精通：未开通<br>
	    大型加工精通：未开通<br><br>';
                $userInfo->money = '100';
                $userInfo->save();

                DB::table('users')->update(['init'=> 1]);

            }
            return redirect('/users/index');
        }

        return view('home');
    }
}
