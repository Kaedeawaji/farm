@extends('layouts.user_layout')
@section('content')


<main>
@can('user-higher')
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('reslist') }}">予約一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.list') }}">口コミ一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user_edit.form') }}">登録情報編集</a>
            </li>
        </ul>
    </div>
    @elsecan('shop-higher')
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">予約一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">口コミ一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">登録情報編集</a>
            </li>
        </ul>
    </div>
    @endcan
        <h1 class="my-2 text-center">牧場詳細</h1>

        <!-- <div id="my_map" style="width: 600px; height: 600px"></div> -->

        <!-- <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=[K7A7aJ1VYE4DH9ZQzYONrFc78ZHeM]&callback=initMap" async defer>
</script>         -->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=<YOUR-API-KEY>&callback=initMapWithAddress" async defer></script> -->

        <!-- <script>
        var _my_address = "{{ $farms['address'] }}";
        function initMapWithAddress() {
            var opts = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };
            var my_google_map = new google.maps.Map(document.getElementById('my_map'), opts);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode(
            {
                'address': _my_address,
                'region': 'jp'
            },
            function(result, status){
                if(status==google.maps.GeocoderStatus.OK){
                    var latlng = result[0].geometry.location;
                    my_google_map.setCenter(latlng);
                    var marker = new google.maps.Marker({position:latlng, map:my_google_map, title:latlng.toString(), draggable:true});
                    google.maps.event.addListener(marker, 'dragend', function(event){
                        marker.setTitle(event.latLng.toString());
                    });

                }
            }
            );
        }
        </script>
 -->
        <div class="text-center" id="map">
            <iframe src="https://maps.google.co.jp/maps?output=embed&q={{ $farms['address'] }}"></iframe>
        </div>
        <div class="col-md-5 mx-auto">

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
                        <th scope='col'></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope='col'>{{ $plans['name'] }}</th>
                        <th scope='col'>{{ $plans['price'] }}</th>
                        <th scope='col'>{{ $plans['detail'] }}</th>
                        <div id="map" width='50%' height='300'></div>
                    </tr>
                </tbody>
            </table>
            <div class="row justify-content-around">
                <a type='submit' class="btn btn-primary w-25 mt-3" href="{{ route ('reserve.form', ['plan' => $plans['id']]) }}" role="button">予約する</a>
                <a type='submit' class="btn btn-primary w-25 mt-3" href="{{ route ('post.form', ['plan' => $plans['id']]) }}" role="button">口コミを投稿する</a>
            </div>
        </div>

    </div>
    @endforeach

    <div class="col-md-5 mx-auto">
        <h1 class="my-2 text-center">口コミ一覧</h1>
    </div>  

            @foreach($post as $posts)
            <div class="m-3 card">
                <div class="card-body">
                    <tbody>
                    <span class="star5_rating" data-rate="{{ $posts['star'] }}"></span>
                    <div class="d-flex justify-content-around">

                        <tr>
                            <th scope='col'>牧場名：</th>
                            　
                            <th scope='col'>タイトル：{{ $posts['title'] }}</th>
                            　
                            <th scope='col'>内容：{{ $posts['body'] }}</th>
                            　
                            <th scope='col'></th>

                            <img class="float-right" src="{{ Storage::url($posts->img) }}" width="25%">
                        </tr>
                        </div>        

                    </tbody>
                </div>        
            </div>
            @endforeach


    <div class="d-flex justify-content-center">
        {{ $post->links() }}
    </div>
</main>
@endsection('content')

