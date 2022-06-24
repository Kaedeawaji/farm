<!doctype html>
<html lang="ja">
  <head>
    <!-- 文字コード・画面表示の設定 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSSの読み込み -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 
    <title></title>
  </head>
    <body>
    <main class="py-4">
        <div class="col-md-5 mx-auto">
       <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">予約一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">プラン一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">登録情報編集</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <h1 class="my-2">プラン一覧</h1>
            <table class="table table-bordered table-striped">
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
        </div>
    </main>
    </body>
</html>