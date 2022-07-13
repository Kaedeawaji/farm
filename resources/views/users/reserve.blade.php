@extends('layouts.user_layout')
@section('content')
    <body>
        <main class="py-4">
            <div class="col-md-5 mx-auto">
                <div class="container">
                    <h1 class="my-2 text-center">予約フォーム</h1>
                    @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                    <form action="" method="post">
                        @csrf
                        <div class="container">
                            <div class="form-group">
                                <label for='day'>希望日</label>
                                <input type="date" class="form-control" name="day" value="{{ old('day') }}">

                                <label for='time'>希望時間</label>
                                <input type="time" class="form-control" name="time" value="{{ old('time') }}">

                                <label for='body' class='mt-2'>人数・その他・ご要望など</label>
                                <textarea type="text" class='form-control' name='body'>{{ old('body') }}</textarea>

                                <div class="form-group p-3 form-check">
                                    <input type="checkbox" name="checkbox" class="form-check-input" id="Check1">
                                    <label class="form-check-label" for="Check1">内容を確認しチェックを入れてください。</label>
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
