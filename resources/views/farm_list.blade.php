@extends('layouts.user_layout')
@section('content')

<main>
@can('user-higher')
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('reslist') }}">予約一覧</a>
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
        </ul>
    </div>
@endcan

    <div class="col-md-5 mx-auto">
        <h1 class="my-2 text-center">牧場一覧</h1>
        
        <div class="d-flex justify-content-center">
            <form action="{{ route('home') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
        </div> 
    </div>  
    @foreach($farms as $farm)

    <div class="m-3 card">
        <div class="card-body text-center">
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>牧場名</th>
                        <th scope='col'>電話番号</th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope='col'>{{ $farm['name'] }}</th>
                        <th scope='col'>{{ $farm['tel'] }}</th>
                        <th scope='col'>
                            <a href="{{ route('detail.plan', ['farm' => $farm['id']]) }}">詳細を見る</a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {{ $farms->links() }}
    </div>
</main>
@endsection('content')
