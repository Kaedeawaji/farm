@extends('layouts.user_layout')
@section('content')
    <body>
        <main class="py-4">
        <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('reslist') }}">予約一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.list') }}">口コミ一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user_edit.form') }}">登録情報編集</a>
                    </li>
                </ul>
            </div>

        <div class="col-md-5 mx-auto">


                    <div class="container">
                        <h1 class="my-2 text-center">登録情報編集</h1>
                    </div>  
                    @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif


                    <form action="" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="name">ユーザー名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name ) }}" />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">メールアドレス</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="email" value="{{ old('email', $user->email ) }}">
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号</label>
                            <input type="tel" class="form-control" id="tel" placeholder="" name="tel" value="{{ old('tel', $user->tel ) }}">
                        </div>
                        <div class="section1 text-center">
                            <button type="submit" class="btn btn-primary">編集する</button>
                        </div>
                    </form> 
                </div>
            </div>
        </main>
    </body>
    @endsection('content')
