@extends('layouts.user_layout')
@section('content')


<main>
@can('user-higher')
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('reserve.list') }}">予約一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.list') }}">口コミ一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user_edit.form') }}">登録情報編集</a>
            </li>
        </ul>
    </div>
    @elsecan('shop-higher')
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">予約一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">口コミ一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">登録情報編集</a>
            </li>
        </ul>
    </div>
    @endcan
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

    <div class="col-md-8 mx-auto">
        </div>
            <nav class="p-3">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">前へ</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">次へ</a></li>
                </ul>
            </nav>    
        </div> 
    </div>
</main>
@endsection('content')

