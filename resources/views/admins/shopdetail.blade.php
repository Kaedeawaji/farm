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
        <table class="table table-bordered table-striped">
            <h1>プラン一覧</h1>
            <tr>
                <th>プラン名</th>
                <th>料金</th>
                <th>詳細</th>
                <!-- 追記1 -->
                <!-- ポイント1 -->
                <th colspan="2"></th>
            </tr>
            <tr th:each="customer : ${customers}">
                <td th:text="${customer.id}"></td>
                <td th:text="${customer.name}"></td>
                <td th:text="${customer.email}"></td>
                <!-- 追記2 -->
                <td>
                    <form th:action="@{/edit}" method="post">
                        <input type="submit" class="btn btn-outline-danger" name="delete" value="削除">
                        <input type="hidden" name="id" th:value="${customer.id}">
                    </form>
                </td>
            </tr>
        </table>
        <div class="container container-m">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <img src="" alt="img" class="img-fulied">
                    <p>Sample TextSampleSample TextSample Sample TextSample Sample TextSample Sample TextSample Sample TextSample Sample TextSample</p>
                    <form th:action="@{/edit}" method="post">
                        <input type="submit" class="btn btn-outline-danger" name="delete" value="削除">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">前へ</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">次へ</a></li>
        </ul>
    </nav>    

@endsection('content')
