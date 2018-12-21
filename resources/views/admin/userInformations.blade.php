@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">选手信息</div>

                    <div class="card-body">
                        <table class="mdui-table">
                            <thead>
                            <tr>
                                <th>名字</th>
                                <th>描述</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userInfos as $userInfo){{-- I am buyer --}}
                            <tr>
                                <td>{{$userInfo->user_name}}</td>
                                <td><form method="post" action="{{route('changeUserInfoStatus')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="userInfoId"
                                           value={{$userInfo->id}}>
                                        <div class="mdui-textfield mdui-textfield-floating-label">
                                            <textarea name="description" class="mdui-textfield-input">{!! $userInfo->description !!}</textarea>
                                        </div>

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
