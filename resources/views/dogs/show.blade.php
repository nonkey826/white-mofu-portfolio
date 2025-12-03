@extends('layouts.app')

@section('title', $dog->name . ' の詳細')

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

<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8">

    {{-- 犬の名前タイトル --}}
    <h1 class="text-3xl font-bold text-center mb-6">
        🐾 {{ $dog->name }} 🐾
    </h1>

    {{-- 画像 --}}
    @if ($dog->image)
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/dogs/' . $dog->image) }}"
                 alt="{{ $dog->name }}"
                 class="rounded-lg shadow w-80">
        </div>
    @endif

    {{-- 詳細 --}}
    <div class="space-y-3 text-lg">
        <p><strong>名前：</strong> {{ $dog->name }}</p>
        <p><strong>犬種：</strong> {{ $dog->breed }}</p>
        <p><strong>年齢：</strong> {{ $dog->age }}才</p>
        <p><strong>体重：</strong> {{ $dog->weight }}kg</p>
        <p><strong>性格：</strong> {{ $dog->personality }}</p>
        <p><strong>好きな食べ物：</strong> {{ $dog->favorite_food }}</p>
    </div>

    {{-- ボタン類 --}}
    <div class="mt-8 flex flex-wrap gap-4 justify-center">

        {{-- 一覧へ --}}
        <a href="{{ route('dogs.index') }}"
           class="px-4 py-2 bg-gray-600 text-white rounded shadow hover:bg-gray-700">
            ← 一覧へ戻る
        </a>

        {{-- 編集 --}}
        <a href="{{ route('dogs.edit', $dog->id) }}"
           class="px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700">
            編集する
        </a>

        {{-- 削除 --}}
        <form method="POST" action="{{ route('dogs.destroy', $dog->id) }}">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2 bg-red-600 text-white rounded shadow hover:bg-red-700"
                    onclick="return confirm('本当に削除しますか？');">
                削除
            </button>
        </form>

        {{-- 押しもふ（セッション保存） --}}
        <a href="/choose/{{ $dog->id }}"
           class="px-4 py-2 bg-pink-500 text-white rounded shadow hover:bg-pink-600">
            推しもふ🐶💗
        </a>

    </div>

</div>

@endsection
