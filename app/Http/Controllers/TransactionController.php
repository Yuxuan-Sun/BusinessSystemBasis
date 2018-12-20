<?php

namespace App\Http\Controllers;

use App\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index() {
        $user = Auth::user();
        $transactions = Transaction::where('seller_id', '=',$user->id)->orWhere('buyer_id','=',$user->id);

        return view('users.transactions.index',compact('transactions'),compact('user'));
    }

    public function changeTransactionStatus(Request $request) {
        $user = Auth::user();
        $currentTransaction = Transaction::query()->find($request->transactionId);

        if ($currentTransaction->status != 0) {
            return view('errors.custom')->with('messeage','订单已完成或取消');
        }

        if ($request->confirm === 'true') {
            $currentTransaction->status = 1;
        } else {
            $currentTransaction->status = -1;
        }

        $currentTransaction->save();

    }
}
