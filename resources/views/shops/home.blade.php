@extends('layouts.shop_layout')
@section('content')
<main class="py-4">
    <div class="">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('shop.shop_home') }}">予約一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop.plan_list') }}">プラン一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop.shop_edit_form') }}">登録情報編集</a>
                </li>
            </ul>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="col-md-5 mx-auto">
                <h1 class="my-2 text-center">予約一覧</h1>
            </div>  
            @foreach($reserves as $reserve)

            <div class="m-3 card ">
                <div class="card-body text-center">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>名前</th>
                                <th scope='col'>アドレス</th>
                                <th scope='col'>電話番号</th>
                                <th scope='col'>プラン名</th>
                                <th scope='col'>体験日</th>
                                <th scope='col'>時間</th>
                                <th scope='col'>その他</th>
                                <th scope='col'></th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>                                    
                                    <th scope='col'>{{ $reserve['user']['name'] }}</th>
                                    <th scope='col'>{{ $reserve['user']['email'] }}</th>
                                    <th scope='col'>{{ $reserve['user']['tel'] }}</th>
                                    <th scope='col'>{{ $reserve['plan']['name'] }}</th>
                                    <th scope='col'>{{ $reserve['day'] }}</th>
                                    <th scope='col'>{{ $reserve['time'] }}</th>
                                    <th scope='col'>{{ $reserve['body'] }}</th>
                                    <th scope='col'>
                                        <a href="{{ route('shop.update.res', ['reserve' => $reserve['id']]) }}">キャンセル</a>
                                    </th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div> 
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
    </div> 
</main>
@endsection('content')
