@extends('layouts.user_layout')
@section('content')
    <body>
        <main class="py-4">
            <div class="col-md-5 mx-auto">
                <div class="container">
                    <h1 class="my-2 text-center">予約フォーム</h1>
                    <form action="" method="post">
                        @csrf
                        <div class="container">
                            <div class="form-group">
                                <label for='day'>希望日</label>
                                <input type="date" class="form-control" name="day">

                                <!-- GETでその牧場の時間を入力？ -->
                                <label for='time'>時間</label>
                                <input type="time" class="form-control" name="time">

                                <label for='body' class='mt-2'>内容</label>
                                <textarea type="text" class='form-control' name='body'></textarea>

                                <div class="form-group p-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">内容を確認しチェックを入れてください。</label>
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary">予約する</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </main>
    </body>
    <!-- bootstrap-datepickerのjavascriptコード -->
        <script>
            $('#date_sample').datepicker();
        </script> 
    @endsection('content')
