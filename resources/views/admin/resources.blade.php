@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <form method="post" action="{{route('changeResourcesStatus')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="resourceId"
                                   value=-1>
                            <h3>目前是第</h3>
                            <input name="year" value="{{$resources[0]->year}}">
                            <h3>财年</h3>
                            <button type="submit" name="confirm" value="true"
                                    class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                <i class="mdui-icon material-icons">更改</i>
                            </button>
                        </form>
                        <form method="post" action="{{route('changeResourcesStatus')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="resourceId"
                                   value=-2>
                            <h3>{{$resources[0]->type}}:</h3>
                            <input name="announcement" value="{{$resources[0]->announcement}}">
                            <button type="submit" name="confirm" value="true"
                                    class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                <i class="mdui-icon material-icons">更改</i>
                            </button>
                        </form>
                        @foreach($resources as $resource)
                            <form method="post" action="{{route('changeResourcesStatus')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="resourceId"
                                       value={{$resource->id}}>
                                <h3>{{$resource->type}}:</h3>
                                <input name="price" value="{{$resource->price}}">
                                <button type="submit" name="confirm" value="true"
                                        class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                    <i class="mdui-icon material-icons">更改</i>
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
