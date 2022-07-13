@extends('layouts.user_layout')
@section('content')


<main>
@can('user-higher')
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('reslist') }}">予約一覧</a>
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

    <div class="text-center" id="map">
        <iframe src="https://maps.google.co.jp/maps?output=embed&q={{ $farms['address'] }}"></iframe>
    </div>
    <h1 class="my-2 text-center">プラン一覧</h1>

    <div class="col-md-8 mx-auto">
        @foreach($plan as $plans)
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
                            <div id="map" width='50%' height='300'></div>
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

        @foreach($post as $posts)
        <div class="m-3 card ">
            <div class="card-body ">
                <tbody>
                    <div class="d-flex align-items-center justify-content-center">
                        <tr>
                        <th scope='col'>名前：{{ $posts['user']['name'] }}</th>　　<br>
                        <span class="star5_rating" data-rate="{{ $posts['star'] }}"></span>
                        </tr>
                    </div>        

                    <div class="d-flex justify-content-around">
                        <tr>
                            <th scope='col'>牧場名：{{ $farms['name'] }}</th><br>
                            <th scope='col'>タイトル：{{ $posts['title'] }}</th><br>
                            <th scope='col'>内容：{{ $posts['body'] }}</th><br>
                            <th scope='col'></th>

                            <img class="" src="{{ Storage::url($posts->img) }}" width="25%">
                        </tr>
                    </div>        
                </tbody>
            </div>        
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
        {{-- paginate --}}
            @if ( $post->hasPages() )
                {!! $post->links() !!}
            @else
                <div class="g_pager">
                    <a class="prev"></a>
                    <a class="current" href=""></a>
                    <a class="next"></a>
                </div>
            @endif
        {{-- / paginate --}}
    </div>

    </div>
</main>
@endsection('content')

