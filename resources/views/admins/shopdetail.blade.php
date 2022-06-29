@extends('layouts.admin_layout')
@section('content')
  <body>
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user_list') }}">ユーザー一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('shop_list') }}">事業者一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                </li>
            </ul>
        </div>

        <div class="col-md-5 mx-auto">
        <h1 class="my-2 text-center">牧場詳細</h1>
    </div>  
    @foreach ($plan as $plans)
    <div class="m-3 card">
        <div class="card-body text-center">
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>プラン名</th>
                        <th scope='col'>料金</th>
                        <th scope='col'>詳細</th>
                        <th scope='col'></th>
                        <th scope='col'></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope='col'>{{ $plans['name'] }}</th>
                        <th scope='col'>{{ $plans['price'] }}</th>
                        <th scope='col'>{{ $plans['detail'] }}</th>
                    </tr>
                </tbody>
            </table>
            <div class="row justify-content-around">
                <a type='submit' class="btn btn-primary w-25 mt-3" href="{{ route ('reserve.form', ['plan' => $plans['id']]) }}" role="button">予約する</a>
                <a type='submit' class="btn btn-primary w-25 mt-3" href="{{ route ('post.form', ['plan' => $plans['id']]) }}" role="button">口コミを投稿する</a>
            </div>
        </div>
    </div>   
    @endforeach

    <div class="col-md-5 mx-auto">
        <h1 class="my-2 text-center">口コミ一覧</h1>
    </div>  

        
    @foreach ($post as $posts)
    <div class="m-3 card">
        <div class="card-body text-center">
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>プラン名</th>
                        <th scope='col'>タイトル</th>
                        <th scope='col'>星</th>
                        <th scope='col'>内容</th>
                        <th scope='col'></th>
                        <th scope='col'></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope='col'>{{ $posts['plan']['name'] }}</th>
                        <th scope='col'>{{ $posts['title'] }}</th>
                        <th scope='col'>{{ $posts['star'] }}</th>
                        <th scope='col'>{{ $posts['body'] }}</th>
                    </tr>
                </tbody>
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
    </div>

@endsection('content')
