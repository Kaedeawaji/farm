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
    <h1 class="my-2">事業者一覧</h1>

    <div class="card-body">
        <div class="d-flex justify-content-center">
            <form action="{{ route('shop_list') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
        </div> 
        <div class="container">
            @foreach($farms as $farm)
            <div class="m-3 card">            
                <div class="card-body text-center">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>名前</th>
                                <th scope='col'>アドレス</th>
                                <th scope='col'>電話番号</th>
                                <th scope='col'></th>
                                <th scope='col'></th>
                                <th scope='col'></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope='col'>{{ $farm->name }}</th>
                                <th scope='col'>{{ $farm->email }}</th>
                                <th scope='col'>{{ $farm->tel }}</th>
                                <th scope='col'>
                                    <a href="{{ route('shop_detail', ['farm' => $farm->id]) }}">詳細</a>
                                </th>

                                <th scope='col'>
                                    <a href="{{ route('shop_edit', ['farm' => $farm->id]) }}">編集</a>
                                </th>
                                <th scope='col'>
                                    <a href="{{ route('update.shop', ['farm' => $farm->id]) }}">削除</a>
                                </th>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach

            <div class="d-flex justify-content-center">
                {{-- paginate --}}
                    @if ( $farms->hasPages() )
                        {!! $farms->links() !!}
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
    </div>
</body>

@endsection('content')
