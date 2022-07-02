@extends('layouts.user_layout')
@section('content')
    <body>
        <main class="py-4">
            <div class="col-md-5 mx-auto">
                
                <div class="container">
                    <h1 class="my-2 text-center">口コミ編集</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                        <section>
                            <style>
                            /* 動作の基本となるcss */

                            .rating {
                                display: inline-flex;
                                flex-direction: row-reverse;
                            }

                            .hidden--visually {
                                border: 0;
                                clip: rect(1px 1px 1px 1px);
                                clip: rect(1px, 1px, 1px, 1px);
                                height: 1px;
                                margin: -1px;
                                overflow: hidden;
                                padding: 0;
                                position: absolute;
                                width: 1px;
                            }

                            /* ここでデザインの変更 */

                            .rating__label {
                                cursor: pointer;
                                color: gray;
                                padding-left: 0.25rem;
                                padding-right: 0.25rem;
                            }

                            .rating__icon::before {
                                content: "★";
                                font-size: 4rem;
                                padding: 1rem;
                            }

                            .rating__input:hover ~ .rating__label {
                                color: lightgray;
                            }

                            .rating__input:checked ~ .rating__label {
                                color: #ffbb00;
                            }
                            </style>

                            <div class="rating">
                            <input class="rating__input hidden--visually" type="radio" id="5-star" name="star" value="5" required />
                            <label class="rating__label" for="5-star" title="星5つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星5つ</span></label>
                            <input class="rating__input hidden--visually" type="radio" id="4-star" name="star" value="4" />
                            <label class="rating__label" for="4-star" title="星4つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星4つ</span></label>
                            <input class="rating__input hidden--visually" type="radio" id="3-star" name="star" value="3" />
                            <label class="rating__label" for="3-star" title="星3つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星3つ/span></label>
                            <input class="rating__input hidden--visually" type="radio" id="2-star" name="star" value="2" />
                            <label class="rating__label" for="2-star" title="星2つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星2つ</span></label>
                            <input class="rating__input hidden--visually" type="radio" id="1-star" name="star" value="1" />
                            <label class="rating__label" for="1-star" title="星1つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星1つ</span></label>
                            </div>

                        </section>                        

                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $result['title'] }}"/>

                            <label for="inputFile">画像選択</label>
                            <input type="file" class="form-control-file" id="inputFile" name="img" value="{{ $result['img'] }}">
                            
                            <label for='body' class='mt-2'>内容</label>
                            <textarea class='form-control' name='body'>{{ $result['body'] }}</textarea>

                            </div>
                            <div class="section1 text-center">
                                <button type="submit" class="btn btn-primary">編集する</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </main>
    </body>
    @endsection('content')
