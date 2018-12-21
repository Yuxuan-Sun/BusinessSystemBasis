@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <form method="post" action="{{route('changeAnnouncementsStatus')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="resourceId"
                                   value=-1>
                            目前是第<input name="year" value="{{$resources[0]->year}}">财年
                            <button type="submit" name="confirm" value="true"
                                    class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                <i class="mdui-icon material-icons">create</i>
                            </button>
                        </form>
                        <form method="post" action="{{route('changeAnnouncementsStatus')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="resourceId"
                                   value=-2>
                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <textarea name="announcement" class="mdui-textfield-input" value={{$resources[0]->announcement}} >{!! $resources[0]->announcement !!}</textarea>
                            </div>
                            <button type="submit" name="confirm" value="true"
                                    class="mdui-btn mdui-btn-icon mdui-color-green mdui-ripple">
                                <i class="mdui-icon material-icons">create</i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
