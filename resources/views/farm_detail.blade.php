@extends('layouts.user_layout')
@section('content')


<main>
@can('user-higher')
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
    @foreach($farms as $farm)

    <div class="m-3 card">
        <div class="card-body">
        <thead>
            <tr>
                <th scope='col'>牧場名</th>
                <th scope='col'>プラン名</th>
                <th scope='col'>電話番号</th>
                <th scope='col'></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope='col'>{{ $farms['name'] }}</th>
                    <th scope='col'>{{ $farms['name'] }}</th>
                    <th scope='col'>{{ $farms['tel'] }}</th>
                </tr>
            </tbody>
            <div class="row justify-content-around">
                <a type='submit' class="btn btn-primary w-25 mt-3" href="{{ route ('reserve.form') }}" role="button">予約する</a>
                <a type='submit' class="btn btn-primary w-25 mt-3" href="{{ route ('post.form', ['farm' => $farms['id']]) }}" role="button">口コミを投稿する</a>
            </div>
        </div>
    </div>   
    @endforeach

    @foreach($farms as $farm)

    <div class="m-3 card">
        <div class="card-body">
            <thead>
                <tr>
                    <th scope='col'>名前</th>
                    <th scope='col'>タイトル  星評価入れる</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope='col'>{{ $farms['name'] }}</th>
                    <th scope='col'></th>
                </tr>
            </tbody>
            <div class="row">
                    <div class="col d-flex align-items-center">
                    <img src="" alt="img" class="img-fulied">
                    <p>Sample TextSampleSample TextSample Sample TextSample Sample TextSample Sample TextSample Sample TextSample Sample TextSample</p>
                </div>
            </div>
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
</body>
@endsection('content')

