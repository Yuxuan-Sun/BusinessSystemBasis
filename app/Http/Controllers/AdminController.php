<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function resources() {
//        $user = Auth::user();
//        if ($user->id != 666) {
//            return redirect('users/index');
//        }

        $resources = DB::table('resources')->get();
        return view('admin.resources')->with('resources',$resources);
    }

    public function changeResourcesStatus(Request $request) {
        $currentResource = DB::table('resources')->where('id','=',$request->resourceId)->first();

        if ($request->resourceId == -1) {
            DB::table('resources')->increment('year',1);
        }

        if ($request->resourceId == -2) {
            DB::table('resources')->update(['announcement',$request->announcement]);
        }

        if ($request->confirm === 'true') {
            DB::table('resources')->where('id','=',$request->resourceId)->update(['price'=> $request->price]);
            //更新卖家买家的资产状态
        }



        return redirect('admin/35/resources');
    }
}
