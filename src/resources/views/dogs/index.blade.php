@extends('layouts.app')

@section('title', '白もふ図鑑')

<style>
body {
    position: relative;
    background: #fff7f0;
    font-family: -apple-system, BlinkMacSystemFont, "Helvetica Neue", "YuGothic", "游ゴシック体", sans-serif;
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

.list-wrapper {
    max-width: 900px;
    margin: 40px auto;
    padding: 24px 16px;
}

.title {
    font-size: 28px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 24px;
}

.dog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 24px;
}

.dog-card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    padding-bottom: 16px;
    overflow: hidden;
    text-align: center;
}

.dog-card img {
    width: 100%;
    height: 240px;
    object-fit: cover;
    object-position: center;
    border-bottom: 1px solid #eee;
    display: block;
}

.dog-name {
    font-weight: bold;
    font-size: 18px;
    margin-top: 10px;
}

.dog-meta {
    color: #555;
    font-size: 13px;
    margin-bottom: 8px;
}

.btn-row {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 8px;
}

.btn {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 13px;
    text-decoration: none;
}

.btn-detail {
    background: #ffb6c1;
    color: #ffffff;
}

.btn-oshi {
    background: #ffd966;
    color: #7a4a00;
}

.add-link {
    margin-top: 24px;
    text-align: center;
}
</style>

@section('content')
<div class="list-wrapper">

    <h1 class="title">🐾 白もふ図鑑 🐾</h1>

    <div class="dog-grid">
        @foreach ($dogs as $dog)
        <div class="dog-card">
            @if ($dog->image)
                <img src="{{ asset('images/dogs/' . $dog->image) }}" alt="{{ $dog->name }}">
            @endif

            <div class="dog-name">{{ $dog->name }}</div>
            <div class="dog-meta">{{ $dog->breed }} ／ {{ $dog->age }}才</div>

            <div class="btn-row">
                <a href="{{ route('dogs.show', $dog->id) }}" class="btn btn-detail">詳しく見る →</a>
                <a href="{{ url('/choose/' . $dog->id) }}" class="btn btn-oshi">推しもふ💗</a>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="add-link">
        <a href="{{ route('dogs.create') }}">＋ 白もふを追加する</a>
    </div>

</div>
@endsection
