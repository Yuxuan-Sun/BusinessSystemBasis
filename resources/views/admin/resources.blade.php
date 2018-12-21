@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @foreach($resources as $resource)
                            <form method="post" action="{{route('changeResourcesStatus')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="resourceId"
                                       value={{$resource->id}}>
                                {{$resource->type}}:
                                <input name="price" value="{{$resource->price}}">
                                <button type="submit" name="confirm" value="true"
                                        class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                    <i class="mdui-icon material-icons">create</i>
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
