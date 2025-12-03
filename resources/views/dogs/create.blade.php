@extends('layouts.app')

@section('title', '白もふ追加')



<style>
body {
    position: relative;
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("{{ asset('images/dogs/nikukyuu.jpg') }}") repeat;
    background-size: 500px;
    opacity: 0.25;
    z-index: -1;
}
</style>


@section('content')
<h1 class="section-title">🐾 白もふを追加する 🐾</h1>

<form action="{{ route('dogs.store') }}" method="POST" style="max-width:600px; margin:0 auto;">
    @csrf

    <div style="display:flex; gap:20px; margin-bottom:15px;">
        <div style="flex:1;">
            <label>名前：</label>
            <input type="text" name="name" class="input-box">
        </div>

        <div style="flex:1;">
            <label>犬種：</label>
            <input type="text" name="breed" class="input-box">
        </div>
    </div>

    <div style="display:flex; gap:20px; margin-bottom:15px;">
        <div style="flex:1;">
            <label>年齢：</label>
            <input type="text" name="age" class="input-box">
        </div>

        <div style="flex:1;">
            <label>体重：</label>
            <input type="text" name="weight" class="input-box"> kg
        </div>
    </div>

    <div style="margin-bottom:15px;">
        <label>性格：</label>
        <input type="text" name="personality" class="input-box">
    </div>

    <div style="margin-bottom:15px;">
        <label>好きな食べ物：</label>
        <input type="text" name="favorite_food" class="input-box">
    </div>

    <div style="margin-bottom:20px;">
        <label>画像ファイル名（images/dogs/）：</label>
        <input type="text" name="image" class="input-box">
    </div>

    <button type="submit" class="btn-main">
        ＋ 白もふを登録する
    </button>
</form>

<style>
    .input-box {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
    }

    .btn-main {
        background: #ffb6c1;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }
</style>

@endsection

