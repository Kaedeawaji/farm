@extends('layouts.user_layout')
@section('content')
    <body>
        <main class="py-4">
            <div class="col-md-5 mx-auto">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reserve_comp.form') }}">予約一覧</a>
                    
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('post.list') }}">口コミ一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user_edit.form') }}">登録情報編集</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-5 p-3 mx-auto">
                    <h1 class="my-2 text-center">口コミ一覧</h1>
                </div>  

                @foreach($posts as $post)
                <div class="m-3 card">
                    <div class="card-body">
                        <tbody>
                            <tr>
                                <th scope='col'>牧場名：</th>
                                /
                                <th scope='col'>タイトル：{{ $post['title'] }}</th>
                                <th scope='col'>内容：{{ $post['body'] }}</th>
                                <th scope='col'>画像：</th>

                            </tr>
                        </tbody>
                        <div class="row justify-content-around">
                            <a href="{{ route('edit.post', ['post' => $post['id']]) }}">
                            <button class="btn btn-secondary">編集</button>
                            <a href="{{ route('update.post', ['post' => $post['id']]) }}">
                            <button class="btn btn-secondary">削除</button>
                        </div>
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
        </main>
    </body>
    @endsection('content')
