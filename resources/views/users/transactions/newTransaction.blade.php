@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="mdui-card-content mdui-typo">
                        <form method="post" action="{{route('newTrans')}}">
                            {{ csrf_field() }}
                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <i class="mdui-icon material-icons adjust_mdui_icon">shopping_basket</i>
                                <label class="mdui-textfield-label">卖方</label>
                                <input class="mdui-textfield-input" id="seller_name" name="seller_name" type="text" required/>
                                <div class="mdui-textfield-error">卖方不能为空</div>
                            </div>
                            <div class="mdui-textfield mdui-textfield-floating-label ">
                                <i class="mdui-icon material-icons adjust_mdui_icon">add</i>
                                <label class="mdui-textfield-label">描述</label>
                                <textarea class="mdui-textfield-input" id="description" name="description" type="text" required/>
                                <div class="mdui-textfield-error">描述不能为空</div>
                            </div>
                            <div class="mdui-textfield mdui-textfield-floating-label ">
                                <i class="mdui-icon material-icons adjust_mdui_icon">add</i>
                                <label class="mdui-textfield-label">交易金额</label>
                                <input class="mdui-textfield-input" id="money" name="money" type="number" required/>
                                <div class="mdui-textfield-error">交易金额不能为空</div>
                            </div>
                            <input type="hidden" name="buyer_id" value={{$user->id}}/>
                            <button data-no-instant type="submit" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme mdui-center">提交
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
