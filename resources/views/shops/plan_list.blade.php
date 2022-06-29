@extends('layouts.shop_layout')
@section('content')
    <main class="py-4">
        <div class="col-md-8 mx-auto">
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
                
                <div class="col-md-8 mx-auto">
                    <h1 class="my-2 text-center">プラン一覧</h1>
                </div>  
                <div class="col-md-8 m-2 text-right">
                    <a href="{{ route('shop.add_plan') }}">プラン追加</a>
                </div>  

            @foreach($plan as $plans)
                <div class="m-3 card">
                    <div class="card-body text-center">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>プラン名</th>
                                    <th scope='col'>料金</th>
                                    <th scope='col'>詳細</th>
                                    <th scope='col'></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th scope='col'>{{ $plans['name'] }} </th>
                                        <th scope='col'>{{ $plans['price'] }}</th>
                                        <th scope='col'>{{ $plans['detail'] }}</th>
                                        <th scope='col'>
                                            <a href="{{ route('shop.update.plan', ['plan' => $plans['id']]) }}">削除</a>
                                        </th>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $plan->links() }}
                </div>            
            </div> 
        </div>
    </main>
@endsection('content')
