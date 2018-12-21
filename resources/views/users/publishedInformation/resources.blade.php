@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <h3>目前是第{{$resources[0]->year}}财年</h3>
                        <h3>公告：{{$resources[0]->announcement}}</h3>
                        @foreach($resources as $resource )
                            <h3>{{$resource->type}}售价:{{$resource->price}}亿</h3>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
