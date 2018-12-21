<?php

namespace App\Http\Controllers;

use App\transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index() {
        $user = Auth::user();
        $transactions = DB::table('transactions')->where('seller_id', '=',$user->id)
            ->orWhere('buyer_id','=',$user->id)->get();

        return view('users.transactions.index')->with('transactions',$transactions)->with('user',$user);
    }



    public function handleTransaction(Request $request) {
        if ($request->form_type == 0 ) {
            $user = Auth::user();


            $currentTransaction = DB::table('transactions')->where('id', '=', $request->transactionId)->first();


            if ($currentTransaction->status != 0) {
                return view('errors.custom')->with('messeage', '订单已完成或取消');
            }

            if ($request->confirm === 'true') {
                DB::table('transactions')->where('id', '=', $request->transactionId)->update(['status' => 1]);
                //更新卖家买家的资产状态
                DB::table('user_informations')
                    ->where('user_id', '=', $currentTransaction->seller_id)
                    ->increment('money', $currentTransaction->money);

                DB::table('user_informations')
                    ->where('user_id', '=', $currentTransaction->buyer_id)
                    ->decrement('money', $currentTransaction->money);
            } else {
                DB::table('transactions')->where('id', '=', $request->transactionId)->update(['status' => -1]);
            }

            return redirect('users/transactions/index');

        } else {
            $seller = DB::table('users') -> where('name',request('seller_name')) -> get() -> first();
            $buyer = DB::table('users')->where('name',request('buyer_name')) -> get() -> first();

            if (empty($seller)) {
                return view('errors.custom')->with('messeage','无此卖家');
            }

            if (empty($buyer)) {
                return view('errors.custom')->with('messeage','无此买家');
            }

            $transaction = new Transaction();
            $transaction->seller_id = $seller->id;
            $transaction->seller_name = request('seller_name');
            $transaction->buyer_id = $buyer->id;
            $transaction->buyer_name = request('buyer_name');
            $transaction->description = request('description');
            $transaction->money = request('money');
            $transaction->status = 0;
            $transaction->save();

            return redirect('users/transactions/index');
        }

    }


    public function newTrans() {

        $seller = DB::table('users') -> where('name',request('seller_name')) -> get() -> first();
        $buyer = DB::table('users')->where('name',request('buyer_name')) -> get() -> first();

        if (empty($seller)) {
            return view('errors.custom')->with('messeage','无此卖家');
        }

            $transaction = new Transaction();
            $transaction->seller_id = $seller->id;
            $transaction->seller_name = request('seller_name');
            $transaction->buyer_id = $buyer->id;
            $transaction->buyer_name = request('buyer_name');
            $transaction->description = request('description');
            $transaction->money = request('money');
            $transaction->status = 0;
            $transaction->save();

        return redirect('users/transactions/index');
    }

    public function enterNewTransaction() {
        $user = Auth::user();
        return view('users.transactions.newTransaction', compact('user'));
    }

}
