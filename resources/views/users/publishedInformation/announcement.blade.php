@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <br>
                <div class="mdui-typo-display-2 mdui-text-center mdui-text-color-theme">
                    公告记录
                </div>

                <div class="card-body">
                    <h3 class="mdui-text-color-theme">目前财年：</h3>
                    <p>{{$resources[0]->year}}</p>

                    <h3 class="mdui-text-color-theme">公告：</h3>
                    <p>{!!$resources[0]->announcement!!}</p>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
