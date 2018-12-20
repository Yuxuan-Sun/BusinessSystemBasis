@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1>等待您确认的交易</h1>
                    @foreach($transactions as $transaction)
                        @if($transaction->buyer_id == $user->id && $transaction->status == 0)
                            <h2>{{ $transaction->id }}</h2>
                        @endif
                    @endforeach

                    <h1>等待对方确认的交易</h1>
                    @foreach($transactions as $transaction)
                        @if($transaction->seller_id == $user->id && $transaction->status == 0)
                            <h2>{{ $transaction->id }}</h2>
                        @endif
                    @endforeach

                    <h1>被取消的交易</h1>
                    @foreach($transactions as $transaction)
                        @if($transaction->status == -1)
                            <h2>{{ $transaction->id }}</h2>
                        @endif
                    @endforeach

                    <h1>已完成的交易</h1>
                    @foreach($transactions as $transaction)
                        @if($transaction->status == 1)
                            <h2>{{ $transaction->id }}</h2>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
