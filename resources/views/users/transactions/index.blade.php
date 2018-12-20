@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1>等待您确认的交易</h1>
                    <table class="mdui-table">
                        <thead>
                        <tr>
                            <th>买方</th>
                            <th>卖方</th>
                            <th>描述</th>
                            <th>创建时间</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction){{-- I am buyer --}}
                        @if($transaction->seller_id == $user->id && $transaction->status == 0)
                            <tr>
                                <td>{{$transaction->buyer_name}}</td>
                                <td>{{$transaction->seller_name}}</td>
                                <td>{{$transaction->description}}</td>
                                <td>{{$transaction->created_at}}</td>
                                <td>
                                    <form action="/users/transactions/index" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="transactionId"
                                               value={{$transaction->id}}>
                                        <button type="submit" name="confirm" value="true"
                                                class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                            <i class="mdui-icon material-icons">接受</i>
                                        </button>
                                        &nbsp&nbsp
                                        <button type='submit' name="confirm" value="false"
                                                class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple">
                                            <i class="mdui-icon material-icons">取消</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>


                    <h1>等待对方确认的交易</h1>
                    <table class="mdui-table">
                        <thead>
                        <tr>
                            <th>买方</th>
                            <th>卖方</th>
                            <th>描述</th>
                            <th>创建时间</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction){{-- I am buyer --}}
                        @if($transaction->buyer_id == $user->id && $transaction->status == 0)
                            <tr>
                                <td>{{$transaction->buyer_name}}</td>
                                <td>{{$transaction->seller_name}}</td>
                                <td>{{$transaction->description}}</td>
                                <td>{{$transaction->created_at}}</td>
                                <td>
                                    <form action="/users/transactions/index" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="transactionId"
                                               value={{$transaction->id}}>
                                        <button type="submit" name="confirm" value="true"
                                                class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                            <i class="mdui-icon material-icons">接受</i>
                                        </button>
                                        &nbsp&nbsp
                                        <button type='submit' name="confirm" value="false"
                                                class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple">
                                            <i class="mdui-icon material-icons">取消</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>

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
