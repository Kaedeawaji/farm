@extends('layouts.shop_layout')
@section('content')
    <body>
        <main class="py-4">
            <div class="col-md-5 mx-auto">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">予約一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">口コミ一覧</a>
                        </li>
                    </ul>
                </div>
                <div class="container">
                    <h1 class="my-2">予約一覧</h1>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>牧場名</th>
                            <th>プラン名</th>
                            <th>希望日</th>
                            <th>時間</th>
                            <th>料金</th>
                            <th>詳細</th>

                            <!-- 追記1 -->
                            <!-- ポイント1 -->
                            <th colspan="2"></th>
                        </tr>
                        <tr th:each="customer : ${customers}">
                            <td th:text="${customer.id}"></td>
                            <td th:text="${customer.id}"></td>
                            <td th:text="${customer.name}"></td>
                            <td th:text="${customer.email}"></td>
                            <td th:text="${customer.email}"></td>
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
