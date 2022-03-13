@extends('layouts.app')

@section('content')
<div class="main-wrapper-add">
    <h1>投稿フォーム</h1>
    <div class="list-box-add">
        <form action="{{ route('adds.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- 場所の名称 --}}
            <div>
                <label for="name_id">名称</label>
                <input type="text" id="name_id" name="place_name">
            </div>

            {{-- 投稿画像の処理 --}}
            <div class="picture">
                <label class="btn-label-add">
                    <input class="btn-remake"type="file" name="img_url" accept="image/jpeg,image/png" required class="col-md-4 col-form-label text-md-right mx-auto">写真を選択
                </label>
                <div class="btn-remake-name">写真が選択されていません</div>
                <div class="picture-clear btn-remake-clear">写真をクリア</div>
            </div>

            {{-- 駐車場 --}}
            <div class="parking-add">
                <p>駐車場</p>
                <div class="parking-add">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking" id="flexRadioDefault1" value="0">
                        <label class="form-check-label" for="flexRadioDefault1">有料</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking" id="flexRadioDefault2" value="1">
                        <label class="form-check-label" for="flexRadioDefault2">無料</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking" id="flexRadioDefault3" value="2">
                        <label class="form-check-label" for="flexRadioDefault3">無</label>
                    </div>
                </div>
            </div>

            {{-- 営業時間 --}}
            <div>
                営業時間
                <input type="time" name="start-time">
                〜
                <input type="time" name="end-time">
            </div>

            {{-- 都道府県--}}
            <div class="select-pref-add">
                <select aria-label="Default select example" name="pref">
                    <option selected disabled>都道府県を選択してください</option>
                    <optgroup label="北海道">
                        <option value="1">北海道</option>
                    </optgroup>
                    <optgroup label="東北">
                        <option value="2">青森県</option>
                        <option value="3">岩手県</option>
                        <option value="4">宮城県</option>
                        <option value="5">秋田県</option>
                        <option value="6">山形県</option>
                        <option value="7">福島県</option>
                    </optgroup>
                    <optgroup label="北関東">
                        <option value="8">茨城県</option>
                        <option value="9">栃木県</option>
                        <option value="10">群馬県</option>
                    </optgroup>
                        <optgroup label="首都圏">
                        <option value="11">埼玉県</option>
                        <option value="12">千葉県</option>
                        <option value="13">東京都</option>
                        <option value="14">神奈川県</option>
                    </optgroup>
                    <optgroup label="甲信越">
                        <option value="15">新潟県</option>
                        <option value="19">山梨県</option>
                        <option value="20">長野県</option>
                    </optgroup>
                    <optgroup label="北陸">
                        <option value="18">福井県</option>
                        <option value="16">富山県</option>
                        <option value="17">石川県</option>
                    </optgroup>
                    <optgroup label="東海">
                        <option value="21">岐阜県</option>
                        <option value="22">静岡県</option>
                        <option value="23">愛知県</option>
                        <option value="24">三重県</option>
                    </optgroup>
                    <optgroup label="近畿">
                        <option value="25">滋賀県</option>
                        <option value="26">京都府</option>
                        <option value="27">大阪府</option>
                        <option value="28">兵庫県</option>
                        <option value="29">奈良県</option>
                        <option value="30">和歌山県</option>
                    </optgroup>
                    <optgroup label="山陽・山陰">
                        <option value="31">鳥取県</option>
                        <option value="32">島根県</option>
                        <option value="33">岡山県</option>
                        <option value="34">広島県</option>
                        <option value="35">山口県</option>
                    </optgroup>
                    <optgroup label="四国">
                        <option value="36">徳島県</option>
                        <option value="37">香川県</option>
                        <option value="38">愛媛県</option>
                        <option value="39">高知県</option>
                    </optgroup>
                    <optgroup label="九州">
                        <option value="40">福岡県</option>
                        <option value="41">佐賀県</option>
                        <option value="42">長崎県</option>
                        <option value="43">熊本県</option>
                        <option value="44">大分県</option>
                        <option value="45">宮崎県</option>
                        <option value="46">鹿児島県</option>
                    </optgroup>
                    <optgroup label="沖縄">
                        <option value="47">沖縄県</option>
                    </optgroup>
                </select>
            </div>

            <input type="hidden" id="lat_id" name="lat">
            <input type="hidden" id="lng_id" name="lng">

            <button class="add-btn" type="submit" onclick="addSuccess()">現在地を追加して投稿</button>
        </form>
    </div>
    <a class="go-home" href="{{ url('/') }}">ホームへ</a>
</div>

<script>

function addSuccess() {
    alert("スポットを追加しました！");
}

if( navigator.geolocation )
{
    navigator.geolocation.getCurrentPosition(

        function( position )
        {
            var data = position.coords ;

            var lat = data.latitude ;
            var lng = data.longitude ;
            document.getElementById( 'lat_id' ).value = lat;
            document.getElementById( 'lng_id' ).value = lng;

        },

        function( error )
        {
            var errorInfo = [
                "原因不明のエラーが発生しました…。" ,
                "位置情報の取得が許可されませんでした…。" ,
                "電波状況などで位置情報が取得できませんでした…。" ,
                "位置情報の取得に時間がかかり過ぎてタイムアウトしました…。"
            ] ;

            var errorNo = error.code ;

            var errorMessage = "[エラー番号: " + errorNo + "]\n" + errorInfo[ errorNo ] ;

            alert( errorMessage ) ;

        } ,

        {
            "enableHighAccuracy": false,
            "timeout": 8000,
            "maximumAge": 2000,
        }

    ) ;
}

else
{
    var errorMessage = "お使いの端末は、GeoLacation APIに対応していません。" ;

    alert( errorMessage ) ;

}

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(function() {
$('.btn-remake').on('change', function () {
let file = $(this).prop('files')[0];
$('.btn-remake-name').text(file.name);
$('.btn-remake-clear').show();
});
$('.btn-remake-clear').click(function() {
$('.btn-remake').val('');
$('.btn-remake-name').text('写真が未選択です');
$(this).hide();
});
});
</script>

@endsection