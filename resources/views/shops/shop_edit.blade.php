@extends('layouts.shop_layout')
@section('content')
    <body>
        <main class="py-4">
            <div class="col-md-5 mx-auto">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('shop.shop_home') }}">予約一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.plan_list') }}">プラン一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('shop.shop_edit_form') }}">登録情報編集</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 mx-auto">
            <div class="col-md-5 mx-auto">
                <h1 class="my-3 text-center">事業者登録情報編集</h1>
            </div>  

            <form action="" method="post">
            @csrf
                <div class="form-group">
                    <label for="name">牧場名</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">メールアドレス</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="tel" class="form-control" id="tel" placeholder="" name="tel" value="{{ $user->tel }}">
                </div>
                <div class="form-group">
                    <label for="address">住所</label>
                    <input type="address" class="form-control" id="address" placeholder="" name="address" value="{{ $user->address }}">
                </div>
                <div class="section1 text-center">
                    <button type="submit" class="btn btn-primary">編集する</button>
                </div>
            </form> 
        </main>
    </body>
    @endsection('content')
