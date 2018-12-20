@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1>{{$userInfo->description}}</h1>
                    <h1>{{ $userInfo->money }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
