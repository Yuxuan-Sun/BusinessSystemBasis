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
                                        {{$map->owner_name}}
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
