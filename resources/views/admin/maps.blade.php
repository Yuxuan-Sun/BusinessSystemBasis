@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <h3 class="mdui-text-color-theme">霉螺岛</h3>
                        <img src="{{ URL::asset('images/meiluo.jpg') }}" style="width: 50%">
                        <h3 class="mdui-text-color-theme">迪诗佩卢岛</h3>
                        <img src="{{ URL::asset('images/dishi.jpg') }}" style="width: 50%">
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
                                                <i class="mdui-icon material-icons">create</i>
                                            </button>
                                        </form>
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
