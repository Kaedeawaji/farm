@extends('layouts.user_layout')
@section('content')
    <body>
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

        <div class="my-5 text-center">
            <div id="mx-auto QandA-1">
                <h2>よくある質問</h2>
                <dl class="my-5 faq">
                    <dt class="faq__dt">Q XXXXXXXXXXX</dt>
                    <dd class="faq__dd">A XXXXXXXXXXX</dd>
                </dl>           
                <dl class="my-5 faq">
                    <dt class="faq__dt">Q XXXXXXXXXXX</dt>
                    <dd class="faq__dd">A XXXXXXXXXXX</dd>
                </dl>           

                <dl class="my-5 faq">
                    <dt class="faq__dt">Q XXXXXXXXXXX</dt>
                    <dd class="faq__dd">A XXXXXXXXXXX</dd>
                </dl>           

                <dl class="my-5 faq">
                    <dt class="faq__dt">Q XXXXXXXXXXX</dt>
                    <dd class="faq__dd">A XXXXXXXXXXX</dd>
                </dl>           
                <dl class="my-5 faq">
                    <dt class="faq__dt">Q XXXXXXXXXXX</dt>
                    <dd class="faq__dd">A XXXXXXXXXXX</dd>
                </dl>           
            </div>  
        </div> 
    </body>
    @endsection('content')
