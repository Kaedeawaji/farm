@extends('layouts.admin_layout')
@section('content')
  <body>
    <div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('user_list') }}">ユーザー一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('shop_list') }}">事業者一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
        </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="input-group">
            <input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="キーワードを入力"></input>
            <span class="input-group-btn input-group-append">
                <submit type="submit" id="btn-search" class="btn btn-primary"><i class="fas fa-search"></i> 検索</submit>
            </span>
        </div>  
        <div class="container">
            <h1 class="my-2">ユーザー一覧</h1>
            @foreach($users as $user)

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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope='col'>{{ $user->name }}</th>
                                <th scope='col'>{{ $user->email }}</th>
                                <th scope='col'>{{ $user->tel }}</th>
                                <th scope='col'>
                                    <a href="{{ route('user_edit', ['user' => $user->id]) }}">編集</a>
                                </th>
                                <th scope='col'>
                                    <a href="{{ route('update.user', ['user' => $user->id]) }}">削除</a>
                                </th>

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
    </div>
</body>
@endsection('content')
