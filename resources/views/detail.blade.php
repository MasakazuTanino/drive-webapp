@extends('layouts.app')

@section('content')
    <div class="main-wrapper-detail">
        <div class="detail-contents">
            <h1>
                @foreach ( $detailed_values as $detailed_value )
                    <p>{{ $detailed_value->place_name }}</p>
                @endforeach
            </h1>
            <div>
                <div>
                    <div class="list-box-detail">
                        @foreach ( $detailed_values as $detailed_value )
                            <img class="image-size" src="{{ $detailed_value->img_url }}" alt="">
                            <p>{{ $pref_zip[$detailed_value->pref] }}</p>
                            <p>営業時間    {{ substr($detailed_value->start_time, 0, 5) }} ～ {{ substr($detailed_value->end_time, 0, 5) }}</p>
                            <p>駐車場   {{ $parking_zip[$detailed_value->parking] }}</p>
                        @endforeach
                    </div>
                </div>

                <div  class="list-box-detail google-map" id="map"></div>

                <h2>コメント</h2>
                <div class="list-box-detail list-comment-detail">
                    <div class="">
                        <ul>
                            @foreach ($comments_values->comments as $comment)
                                <li class="comment-detail">
                                    <p class="comment-item">{!! nl2br($comment->body) !!}</p>
                                    @if (Auth::user()->id == $comment->user_id)
                                        <form method="post" action="{{ route('details.destroy', $comment) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="detail-btn">削除</button>
                                        </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <form name="form" method="post" action="{{ route('details.comment', $comments_values) }}">
                            @csrf
                        <textarea name="body" cols="30" rows="5" placeholder="コメントを記入してください。"></textarea>
                            <button onclick="check()">コメント追加</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google-map.apikey')}}&callback=initMap" async defer></script>

    <script>
    const myLatLng = { lat: {{ $detailed_value->lat}}, lng: {{ $detailed_value->lng}} };
    </script>

    <script src="{{ asset('/js/detail.js') }}"></script>
@endsection