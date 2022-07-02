@extends('layouts.user_layout')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reslist') }}">予約一覧</a>
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
                            <div class="rating">
                                <section>
                                    <th scope='col'>{{ $post['star'] }}</th>
                                        
                                    <div class="d-flex justify-content-around">
                                    <th scope='col'>牧場名：</th><br>
                                    <th scope='col'>タイトル：{{ $post['title'] }}</th><br>
                                    <th scope='col'>内容：{{ $post['body'] }}</th><br>

                                    <img class="text-right" src="{{ Storage::url($post->img) }}" width="25%">
                                </section>   
                            </div>        

                        </tr>

                        <div class="row justify-content-around ">
                            <a type='submit' class="btn btn-primary w-25 m-3" href="{{ route('edit.post', ['post' => $post['id']]) }}" role="button">編集</a>
                            <a type='submit' class="btn btn-primary w-25 m-3" href="{{ route('update.post', ['post' => $post['id']]) }}" role="button">削除</a>
                        </div>
                    </tbody>
                </div>        
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>            
        </div> 
    </main>
    @endsection('content')
