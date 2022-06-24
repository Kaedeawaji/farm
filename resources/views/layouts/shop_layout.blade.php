<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('stylesheet')
    </head>
    <body>
        <div id="app">
            <nav class=".bg-info navbar p-3 h5 justify-content-around bg-white shadow-sm">
                <!-- <div class="container d-flex">
                    <a class="navbar-brand" href="{{ url('/') }}">トップ</a>
                </div> -->
                <div class="my-navbar-control">
                    @if(Auth::check())
                    <!-- <a href="#" id="logout" class="my-navbar-item">予約一覧</a>
                    <a href="#" id="logout" class="my-navbar-item">口コミ一覧</a>
                    <a href="#" id="logout" class="my-navbar-item">登録情報編集</a>
 -->                   

                        <span class="my-navbar-item">{{ Auth::user()->name }}</spen>
                        /
                        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                        <form id="logout-form" action="{{ route('shop.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <script>
                            document.getElementById('logout').addEventListener('click', function(event) {
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                            });
                        </script>
                    @else
                    <a class="my-navbar-item" href="{{ route('home') }}">トップ</a> 
                        　
                        <a class="my-navbar-item" href="{{ route('login') }}">ユーザーログイン</a>
                        　
                        <a class="my-navbar-item" href="{{ route('register') }}">ユーザー新規登録</a>
                        　
                        <a class="my-navbar-item" href="{{ route('shop.login') }}">事業者ログイン</a>
                        　
                        <a class="my-navbar-item" href="{{ route('shop.register') }}">事業者新規登録</a>
                    @endif
                </div>
            </nav>
            @yield('content')
        </div>
        <footer>
            <div class="card-footer text-center">
                <a class="text-reset" href="question.blade.php" role="button">よくある質問</a>
            </div>
        </footer>
    </body>
</html>