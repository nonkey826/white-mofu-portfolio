@extends('layouts.app')


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
    background-size: 500px;
    opacity: 0.25;
    z-index: -1;
}
</style>


@section('content')
<div class="container" style="max-width:600px; margin:30px auto;">

    <h1 style="text-align:center; margin-bottom:25px; font-size:32px;">
        🐾 白もふ検索フォーム 🐾
    </h1>

    <div style="background:white; padding:25px; border-radius:15px;
                box-shadow:0 4px 10px rgba(0,0,0,0.1);">

        <form action="{{ route('dogs.search') }}" method="POST" style="text-align:center;">
            @csrf
            <input 
                type="text" 
                name="input" 
                value="{{ $input ?? '' }}"  
                placeholder="名前で検索（例：さんた）"
                style="padding:10px 15px; width:80%; border-radius:8px; border:1px solid #ccc;"
            >
            <button 
                type="submit"
                style="padding:10px 20px; background:#ffb3c6; border:none;
                       border-radius:8px; margin-left:5px; cursor:pointer;">
                検索
            </button>
        </form>

        @isset($item)
            <div style="margin-top:30px; text-align:center;">
                @if ($item)
                    <h2>{{ $item->name }} が見つかりました！</h2>

                    <a href="{{ route('dogs.show', $item->id) }}"
                       style="display:inline-block; margin-top:15px; background:#ff8fab;
                              color:white; padding:10px 20px; border-radius:10px;
                              text-decoration:none;">
                        詳しく見る →
                    </a>
                @else
                    <p style="color:#555; margin-top:20px;">該当する白もふはいませんでした😢</p>
                @endif
            </div>
        @endisset

    </div>

    <div style="text-align:center; margin-top:30px;">
        <a href="{{ route('dogs.index') }}" style="color:#999; text-decoration:none;">
            ← 一覧ページに戻る
        </a>
    </div>

</div>
@endsection
