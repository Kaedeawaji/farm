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
            <h1 class="my-2">事業者登録情報編集</h1>

            <form>
                <div class="form-group">
                    <label for="name">牧場名</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                    </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">メールアドレス</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputtel">電話番号</label>
                    <input type="tel" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>
                <div class="form-group">
                    <label for="name">住所</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('name') }}" />
                </div>
                <div class="form-group row justify-content-center">
                    <button type="submit" class="btn btn-primary">編集する</button>
                </div>
            </form> 
        </main>
    </body>
</html>