@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <br>
                <div class="mdui-typo-display-2 mdui-text-center mdui-text-color-theme">
                    资源信息
                </div>

                    <div class="card-body">
                        <h3>目前是第{{$resources[0]->year}}财年</h3>
                        <h3>公告：{!!$resources[0]->announcement!!}</h3>
                        <h3 class="mdui-text-color-theme">价目表</h3>
                        @foreach($resources as $resource )
                            <p>{{$resource->type}}售价:{{$resource->price}}亿</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
