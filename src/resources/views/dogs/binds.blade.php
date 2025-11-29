@extends('layouts.app')

@section('title', '白もふ詳細')
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
    background: url("{{ asset('images/dogs/nikukyuu-bk.jpg') }}") repeat;
    background-size: 600px;
    opacity: 0.2; /* ← 背景だけ薄くできる */
    z-index: -1; /* 画面の後ろ */
}
</style>

@section('content')
<h1>{{ $item->name }} の情報</h1>

<ul>
    <li>ID：{{ $item->id }}</li>
    <li>名前：{{ $item->name }}</li>
    <li>犬種：{{ $item->breed }}</li>
    <li>性格：{{ $item->personality }}</li>
</ul>
@endsection
