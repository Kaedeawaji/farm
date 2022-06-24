@extends('layouts.user_layout')
@section('content')
  </head>
    <body>
        <main class="py-4">
            <div class="col-md-5 mx-auto">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                        <a class="nav-link active" href="{{ route('reserve_comp.form') }}">予約一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.list') }}">口コミ一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user_edit.form') }}">登録情報編集</a>
                        </li>
                    </ul>
                </div>
            <div class="col-md-8 mx-auto">
            <div class="col-md-5 mx-auto">
        <h1 class="my-2 text-center">予約一覧</h1>
    </div>  
    @foreach($reserves as $reserve)

    <div class="m-3 card">
        <div class="card-body text-center">
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>牧場名</th>
                        <th scope='col'>プラン名</th>
                        <th scope='col'>体験日</th>
                        <th scope='col'>時間</th>
                        <th scope='col'>内容</th>
                        <th scope='col'></th>

                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope='col'>{{ $reserve['name'] }}</th>
                            <th scope='col'>{{ $reserve['name'] }} </th>
                            <th scope='col'>{{ $reserve['day'] }}</th>
                            <th scope='col'>{{ $reserve['time'] }}</th>
                            <th scope='col'>{{ $reserve['body'] }}</th>

                            <th scope='col'>
                                <a href="{{ route('update.reserve', ['reserve' => $reserve['id']]) }}">キャンセル</a>
                            </th>
                        </tr>
                </tbody>
                </table>
            </table>
        </div>
    </div>
    @endforeach

        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">前へ</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">次へ</a></li>
            </ul>
        </nav>    
        </main>
    </body>
    @endsection('content')
