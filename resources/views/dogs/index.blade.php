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

{{-- トップへ戻るリンク --}}
<div style="margin-bottom: 20px;">
    <a href="/" 
       style="
            display: inline-block;
            padding: 8px 14px;
            background: #fff8f2;
            color: #555;
            border: 1px solid #ffd9c6;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
            transition: 0.2s;
       "
       onmouseover="this.style.transform='translateY(-3px)'"
       onmouseout="this.style.transform='translateY(0)'"
    >
        ← 白もふポータルへ戻る
    </a>
</div>


    <h1 class="title">🐾 白もふ図鑑 🐾</h1>

    <form action="{{ route('dogs.index') }}" method="GET" style="margin-bottom: 20px; display:flex; gap:15px;">

   {{-- 🔍 キーワード検索 --}}
<input type="text" name="keyword"
       value="{{ request('keyword') }}"
       placeholder="名前・犬種で検索"
       style="padding:8px 12px; border:1px solid #ccc; border-radius:6px;">

{{-- ↕ 並び替え --}}
<select name="sort" style="padding:8px 12px; border:1px solid #ccc; border-radius:6px;">
    <option value="">ID昇順（標準）</option>
    <option value="id_desc" {{ request('sort')=='id_desc' ? 'selected' : '' }}>ID降順</option>

    <option value="name_asc" {{ request('sort')=='name_asc' ? 'selected' : '' }}>名前昇順</option>
    <option value="name_desc" {{ request('sort')=='name_desc' ? 'selected' : '' }}>名前降順</option>

    {{-- ⭐ ここから体重ソート --}}
    <option value="weight_asc" {{ request('sort')=='weight_asc' ? 'selected' : '' }}>体重が軽い順</option>
    <option value="weight_desc" {{ request('sort')=='weight_desc' ? 'selected' : '' }}>体重が重い順</option>
</select>


    <button style="padding:8px 12px; background:#4a8bdc; color:white; border:none; border-radius:6px;">
        検索
    </button>
</form>


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
