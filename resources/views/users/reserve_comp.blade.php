@extends('layouts.user_layout')
@section('content')
    <body>
        <main class="py-4">
            <div class="col-md-5 mx-auto">
                <div class="container">
                    <h1 class="my-2 text-center">予約フォーム</h1>
                    <div class="col-md-5 mx-auto">
                        <div class="card">
                            <div class="card-body text-center">
                                <p>予約ありがとうございました。<br>送信完了しました。</p>
                                <div class="section1 text-center">
                                    <a href="{{ route('reserve_comp.form') }}">
                                        <button type="submit" href="farm_list.php" class="btn btn-primary">戻る</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <!-- bootstrap-datepickerのjavascriptコード -->
        <script>
            $('#date_sample').datepicker();
        </script> 
 @endsection('content')
