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
            <h1 class="my-2 text-center">プラン一覧</h1>
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
                            <th scope='col'>
                                <a href="{{ route('delete.plan', ['plan' => $plans->id]) }}">削除</a>
                            </th>
                        </tr>
                    </tbody>
                </table>
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
            <tbody>
                <tr>
                    <span class="star5_rating" data-rate="{{ $posts['star'] }}"></span>

                    <div class="d-flex justify-content-around">
                        <th scope='col'>牧場名：</th><br>
                        <th scope='col'>タイトル：{{ $posts['title'] }}</th><br>
                        <th scope='col'>内容：{{ $posts['body'] }}</th><br>
                        <img class="text-right" src="{{ Storage::url($posts->img) }}" width="25%">
                        <th scope='col'>
                            <a href="{{ route('delete.post', ['post' => $posts->id]) }}">削除</a>
                        </th>
                    </div>        
                </tr>
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
</body>

@endsection('content')
