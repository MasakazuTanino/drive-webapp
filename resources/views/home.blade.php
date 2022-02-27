@extends('layouts.app')

@section('content')
<div class="main-wrapper-margin">
    <div>
        <h1>スポットを探す</h1>
        <p>行きたい場所または都道府県を入力してください</p>
    </div>

    <div class="search-content">
        <form class="search-form" action="{{ route('home.search') }}" method="post">
            @csrf
            <input type="text" name="search_place_name">
            <div>
                <select class="select-home" aria-label="Default select example" name="search_pref">
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
            <button type="submit">検索</button>
        </form>
    </div>

    <div class="list-content">
        @foreach ( $list_values as $list_value )
        <div class="list-box">
                <img class="image-size" src="{{ $list_value->img_url }}">
                <p>{{ $list_value->place_name }}</p>
                <p>{{ $pref_zip[$list_value->pref] }}</p>
                <a href="{{ route('details.index', $list_value->id)}}">詳細ページ</a>
            </div>
        @endforeach
    </div>
</div>

@endsection