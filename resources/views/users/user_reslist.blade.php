@extends('layouts.user_layout')
@section('content')
<main class="py-4">
<div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                    <a class="nav-link active" href="{{ route('reslist') }}">予約一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.list') }}">口コミ一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user_edit.form') }}">登録情報編集</a>
                    </li>
                </ul>
            </div>

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
                            <th scope='col'>{{ $reserve['farm']['name'] }}</th>
                            <th scope='col'>{{ $reserve['plan']['name'] }} </th>
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

    <div class="d-flex justify-content-center">
        {{-- paginate --}}
            @if ( $reserves->hasPages() )
                {!! $reserves->links() !!}
            @else
                <div class="g_pager">
                    <a class="prev"></a>
                    <a class="current" href=""></a>
                    <a class="next"></a>
                </div>
            @endif
        {{-- / paginate --}}
    </div>

</main>
    @endsection('content')
