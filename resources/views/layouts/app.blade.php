<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')-GambleForCrisis</title>

    <!-- Scripts -->
    <link href="https://cdn.bootcss.com/mdui/0.3.0/css/mdui.min.css" rel="stylesheet">
    <link href="{{ secure_asset('assets/mdi/css/materialdesignicons.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <script src="https://cdn.bootcss.com/mdui/0.3.0/js/mdui.min.js" data-no-instant></script>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script href="utils.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
        $(document).ready(function () {
            $('.navi').hover(
                function () {
                    var bLeft = $(this).position().left;
                    bLeft -= 8;
                    $('#effect').css({
                        "position": "absolute",
                        "top": "100%",
                        "left": bLeft,
                        "background-color": "#389688",
                        "width": "150px",
                        "height": "10%"
                    })
                    $(this).addClass('mdui-shadow-5')
                },
                function () {
                    $('#effect').css({
                        "background-color": "transparent"
                    })
                    $(this).removeClass('mdui-shadow-5')
                }
            )
        })
    </script>

    <style>
        .doc-container {
            padding-top: 30px;
            padding-bottom: 150px;
        }

        .mdui-tab {
            min-width: 40px;
        !important;
        }

        .company {
            padding: 10px;
        !important;
        }

        .bg-img {
            height: 700px;
        }

        .mdui-typo-title {
            margin-left: 30px;
        }

        .mdui-color-theme-accent {
            font-size: 15px;
        }
    </style>

</head>


<body class="mdui-theme-primary-teal mdui-appbar-with-toolbar">
<div id="app">
    <body class="mdui-theme-primary-teal mdui-appbar-with-toolbar">


    <div class="mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-white mdui-row">
            <div class="mdui-typo-title">Finance Club</div>
            <button class="navi mdui-btn mdui-color-theme-accent"
                    style="width: 150px !important;height: 100% !important;"
                    mdui-menu="{target: '#user'}">
                个人
                <i class="mdui-icon material-icons">&#xe7fd;</i>
            </button>
            <ul class="mdui-menu mdui-menu-cascade" id="user">
                <li class="mdui-menu-item">
                    <a href="/users/index" class="mdui-ripple">
                        个人信息
                    </a>
                </li>
            </ul>

            <div></div>
            <button class="navi mdui-btn mdui-color-theme-accent"
                    style="width: 150px !important;height: 100% !important;"
                    mdui-menu="{target: '#information'}">
                资讯
                <i class="mdui-icon material-icons">&#xe048;</i>
            </button>
            <ul class="mdui-menu mdui-menu-cascade" id="information">
                <li class="mdui-menu-item">
                    <a href="/users/resources" class="mdui-ripple">
                        资源价目
                    </a>
                </li>
                <li class="mdui-menu-item">
                    <a href="/users/maps" class="mdui-ripple">
                        地图信息
                    </a>
                </li>
                <li class="mdui-menu-item">
                    <a href="/users/announcement" class="mdui-ripple">
                        公告记录
                    </a>
                </li>
            </ul>

            <div></div>
            <button class="navi mdui-btn mdui-color-theme-accent"
                    style="width: 150px !important;height: 100% !important;"
                    mdui-menu="{target: '#transaction'}">
                交易
                <i class="mdui-icon material-icons">&#xe854;</i>
            </button>
            <ul class="mdui-menu mdui-menu-cascade" id="transaction">
                <li class="mdui-menu-item">
                    <a href="/users/transactions/index" class="mdui-ripple">
                        交易列表
                    </a>
                </li>
            </ul>

            <div id="effect"></div>

            <div class="navbar-nav ml-auto">
                @guest
                    <a class="navi mdui-btn mdui-color-theme-accent"
                       style="width: 150px !important;height: 100% !important;"
                       href="{{ route('login') }}">{{ __('Login') }}>
                        {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                    </a>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <button class="navi mdui-btn mdui-color-theme-accent"
                            style="width: 150px !important;height: 100% !important;"
                            mdui-menu="{target: '#right'}">
                        {{ Auth::user()->name }}
                        <i class="mdui-icon material-icons">&#xe048;</i>
                    </button>
                    <ul class="mdui-menu mdui-menu-cascade" id="right">
                        <li class="mdui-menu-item">
                            <a class="mdui-ripple" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @endguest
            </div>
        </div>
    </div>

    <!--<canvas id="background"> </canvas>-->


    @yield('content')

    <div class="mdui-bottom-nav mdui-bottom-nav-text-auto mdui-color-white">
        <div class="mdui-container">
            <div class="mdui-row">
                <div class="mdui-text-center mdui-m-t-3">
                    <div>Powered️ by HFI Programming</div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
