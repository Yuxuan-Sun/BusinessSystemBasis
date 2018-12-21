@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <table class="mdui-table">
                            <thead>
                            <tr>
                                <th>名字</th>
                                <th>持有者</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($maps as $map){{-- I am buyer --}}
                                <tr>
                                    <td>{{$map->name}}</td>
                                    <td>
                                        <form method="post" action="{{route('changeMapStatus')}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="mapId"
                                                   value={{$map->id}}>
                                            <input name="owner_name" value="{{$map->owner_name}}">
                                            <button type="submit" name="confirm" value="true"
                                                    class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                                <i class="mdui-icon material-icons">更改</i>
                                            </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
