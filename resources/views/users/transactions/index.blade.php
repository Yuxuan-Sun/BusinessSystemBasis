@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mdui-container">
            <div class="mdui-col-sm-12 mdui-m-t-2">
                <br>

                <div class="mdui-typo-display-2 mdui-text-center mdui-text-color-theme">
                    交易列表
                </div>

                <h3 class="mdui-text-color-theme">等待您确认的交易</h3>
                <br>
                <table class="mdui-table">
                    <thead>
                    <tr>
                        <th>买方</th>
                        <th>卖方</th>
                        <th>描述</th>
                        <th>金额</th>
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
                            <td>{{$transaction->money}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>
                                <form method="post" action="{{route('handleTrans')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="form_type"
                                           value=0>
                                    <input type="hidden" name="transactionId"
                                           value={{$transaction->id}}>
                                    <button type="submit" name="confirm" value="true"
                                            class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                        <i class="mdui-icon material-icons">check</i>
                                    </button>
                                    &nbsp&nbsp
                                    <button type='submit' name="confirm" value="false"
                                            class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple">
                                        <i class="mdui-icon material-icons">close</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>

<br>
                <h3 class="mdui-text-color-theme">等待对方确认的交易</h3>
                <br>
                <table class="mdui-table">
                    <thead>
                    <tr>
                        <th>买方</th>
                        <th>卖方</th>
                        <th>描述</th>
                        <th>金额</th>
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
                            <td>{{$transaction->money}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>
                                <form action="{{route('handleTrans')}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="form_type"
                                           value=0>
                                    <input type="hidden" name="transactionId"
                                           value={{$transaction->id}}>
                                    <button type="submit" name="confirm" value="true"
                                            class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                        <i class="mdui-icon material-icons">check</i>
                                    </button>
                                    &nbsp&nbsp
                                    <button type='submit' name="confirm" value="false"
                                            class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple">
                                        <i class="mdui-icon material-icons">close</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
<br>
                <h3 class="mdui-text-color-theme">被取消的交易</h3>
                <br>
                <table class="mdui-table">
                    <thead>
                    <tr>
                        <th>买方</th>
                        <th>卖方</th>
                        <th>描述</th>
                        <th>金额</th>
                        <th>创建时间</th>
                        <th>状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction){{-- I am buyer --}}
                    @if($transaction->status == -1)
                        <tr>
                            <td>{{$transaction->buyer_name}}</td>
                            <td>{{$transaction->seller_name}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->money}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>已取消</td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>

                <br>
                <h3 class="mdui-text-color-theme">已完成的交易</h3>
                <br>
                <table class="mdui-table">
                    <thead>
                    <tr>
                        <th>买方</th>
                        <th>卖方</th>
                        <th>描述</th>
                        <th>金额</th>
                        <th>创建时间</th>
                        <th>状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction){{-- I am buyer --}}
                    @if($transaction->status == 1)
                        <tr>
                            <td>{{$transaction->buyer_name}}</td>
                            <td>{{$transaction->seller_name}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->money}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>已完成</td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>

                <br>
                <div class="mdui-btn mdui-btn-ripple mdui-color-theme mdui-center" mdui-dialog="{target: '.new-transaction'}">
                    创建新交易
                </div>
                <div class="mdui-dialog new-transaction">
                    <div class="mdui-dialog-title mdui-text-color-theme">新的交易</div>
                    <form method="post" action="{{route('handleTrans')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="form_type"
                               value=1>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <i class="mdui-icon material-icons adjust_mdui_icon">shopping_basket</i>
                            <label class="mdui-textfield-label">卖方</label>
                            <input class="mdui-textfield-input" id="seller_name" name="seller_name" type="text" required/>
                            <div class="mdui-textfield-error">卖方不能为空</div>
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label ">
                            <i class="mdui-icon material-icons adjust_mdui_icon">add</i>
                            <label class="mdui-textfield-label">描述</label>
                            <textarea class="mdui-textfield-input" id="description" name="description" type="text" required></textarea>
                            <div class="mdui-textfield-error">描述不能为空</div>
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label ">
                            <i class="mdui-icon material-icons adjust_mdui_icon">add</i>
                            <label class="mdui-textfield-label">交易金额</label>
                            <input class="mdui-textfield-input" id="money" name="money" type="number" required/>
                            <div class="mdui-textfield-error">交易金额不能为空</div>
                        </div>
                        <input type="hidden" name="buyer_name" value={{$user->name}}>
                        <button data-no-instant type="submit" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme mdui-center">提交
                        </button>
                        <br>
                    </form>
                </div>
                <br>

            </div>

        </div>

    </div>
@endsection
