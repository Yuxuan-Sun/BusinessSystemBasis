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
}
