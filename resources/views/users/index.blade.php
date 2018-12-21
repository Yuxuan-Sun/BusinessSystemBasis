@extends('layouts.app')

@section('title')
    个人信息
@endsection

@section('content')
    <div class="mdui-container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <br>
                    <div class="mdui-typo-display-2 mdui-text-center mdui-text-color-theme">
                        个人信息
                    </div>
                    <div class="mdui-card-content">
                        您的资产：{{ $userInfo->money }}
                        <br>
                        您的描述：{!!$userInfo->description!!}
                        <div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
