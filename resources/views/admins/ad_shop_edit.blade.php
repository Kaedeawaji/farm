@extends('layouts.admin_layout')
@section('content')
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('user_list') }}">ユーザー一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('shop_list') }}">事業者一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
        </li>
        </ul>
    </div>

    <main class="py-4">
    <h1 class="my-2">事業者登録情報編集</h1>
        <div class="col-md-5 mx-auto text-left">
            <div class="container">
                <form action="" method="post">
                @csrf
                    <div class="form-group">
                        <label for="name">事業者名</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $farm->name }}" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">メールアドレス</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="" value="{{ $farm->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputtel">電話番号</label>
                        <input type="tel" class="form-control" id="exampleInputPassword1" name="tel" placeholder="" value="{{ $farm->tel }}">
                    </div>            
                    <div class="form-group">
                        <label for="address">住所</label>
                        <input type="address" class="form-control" id="address" name="address" value="{{ $farm->address }}" />
                    </div>

                    <div class="section1 text-center">
                        <button type="submit" class="btn btn-primary">編集する</button>
                    </div>
                </form> 
            </div>
        </div>
    </main>
</div>
      

@endsection('content')
