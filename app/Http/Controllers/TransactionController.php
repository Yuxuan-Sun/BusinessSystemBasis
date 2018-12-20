<?php

namespace App\Http\Controllers;

use App\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index() {
        $user = Auth::user();
        $transactions = Transaction::where('seller_id', '=',$user->id)->orWhere('buyer_id','=',$user->id);

        return view('users.transactions.index',compact('transactions'),compact('user'));
    }



    public function changeTransactionStatus(Request $request) {
        $user = Auth::user();
        $currentTransaction = DB::table('transactions')->where('id','=',$request->transactionId)->first();

        if ($currentTransaction->status != 0) {
            return view('errors.custom')->with('messeage','订单已完成或取消');
        }

        if ($request->confirm === 'true') {
            $currentTransaction->status = 1;
        } else {
            $currentTransaction->status = -1;
        }

        $currentTransaction->save();

        //更新卖家买家的资产状态
        DB::table('user_informations')
            ->where('user_id','=',$currentTransaction->seller_id)
            ->increment('money',$currentTransaction->money);

        DB::table('user_informations')
            ->where('user_id','=',$currentTransaction->buyer_id)
            ->decrement('money',$currentTransaction->money);

        return view('users.transactions.index');

    }


    public function newTransaction(Request $request) {
        DB::table('transactions')->insert(['seller_id'=> User::where('name','=', $request->seller_name)->get()->first()->id,'seller_name'=> $request->seller_name
            ,'buyer_id'=> User::where('name','=', $request->buyer_name)->get()->first()->id,'buyer_name'=> $request->buyer_name,
            'description'=>$request->description,'money'=>$request->money]);

        return view('users.transactions.index');
    }

    public function enterNewTransaction() {
        $user = Auth::user();
        view('users.transactions.newTransaction', compact($user));
    }
}
