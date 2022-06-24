<!doctype html>
<html lang="ja">
  <head>
    <!-- 文字コード・画面表示の設定 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSSの読み込み -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 
    <title>パスワードリセット</title>
  </head>
    <body>
    <main class="py-4">
        <div class="col-md-5 mx-auto">

            <div class="card">
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
                            <label for='name'>プラン名</label>
                                <input type='text' class='form-control' name='name'/>
                                <label for='amount'>料金</label>
                                <input type='text' class='form-control' name='amount' value="{{ old('amount') }}"/>
                                <label for='comment' class='mt-2'>詳細</label>
                                <textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>



                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>追加</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </body>
</html>