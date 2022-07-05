@extends('layouts.shop_layout')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop.shop_home') }}">予約一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('shop.plan_list') }}">プラン一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop.shop_edit_form') }}">登録情報編集</a>
                    </li>
                </ul>
            </div>
            <div class="card-header">
                <h4 class='text-center'>体験プラン追加</h1>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class = 'panel-body'>
                        @if($errors->any())
                        <div class='alert alert-danger'>
                            <ul>
                                @foreach($errors->all() as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>                                         

                    <form action="" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="name">プラン名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                        </div>

                        <div class="form-group">
                            <label for="price">料金</label>
                            <input type="price" class="form-control" id="price" placeholder="" name="price" value="{{ old('price') }}" />
                        </div>
                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="detail" class="form-control" id="detail" placeholder="" name="detail" value="{{ old('detail') }}" />
                        </div>
                        <div class="section1 text-center">
                            <button type="submit" class="btn btn-primary">追加する</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </main>
    @endsection('content')
