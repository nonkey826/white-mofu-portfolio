@extends('layouts.app')

@section('title', '白もふ編集')

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
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-center text-2xl font-bold mb-4">
        🐾 {{ $dog->name }} の編集 🐾
    </h1>

    {{-- 画像プレビュー --}}
    <div class="text-center mb-4">
        <img src="{{ asset('images/dogs/' . $dog->image) }}"
             class="w-48 h-48 object-cover rounded-lg mx-auto">
        <p class="text-gray-600 mt-2 text-sm">
            現在の画像：{{ $dog->image }}
        </p>
    </div>

    <form action="{{ route('dogs.update', $dog->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- 名前 --}}
        <label class="font-semibold">名前：</label>
        <input type="text" name="name" value="{{ $dog->name }}"
               class="w-full border p-2 rounded mb-4">

        {{-- 犬種 --}}
        <label class="font-semibold">犬種：</label>
        <input type="text" name="breed" value="{{ $dog->breed }}"
               class="w-full border p-2 rounded mb-4">

        {{-- 年齢 --}}
        <label class="font-semibold">年齢：</label>
        <input type="number" name="age" value="{{ $dog->age }}"
               class="w-full border p-2 rounded mb-4">

        {{-- 体重 --}}
        <label class="font-semibold">体重：</label>
        <input type="number" name="weight" value="{{ $dog->weight }}"
               class="w-full border p-2 rounded mb-4">

        {{-- 性格 --}}
        <label class="font-semibold">性格：</label>
        <input type="text" name="personality" value="{{ $dog->personality }}"
               class="w-full border p-2 rounded mb-4">

        {{-- 好きな食べ物 --}}
        <label class="font-semibold">好きな食べ物：</label>
        <input type="text" name="favorite_food" value="{{ $dog->favorite_food }}"
               class="w-full border p-2 rounded mb-4">

        {{-- 画像ファイル名 --}}
        <label class="font-semibold">画像ファイル名（images/dogs 内）：</label>
        <input type="text" name="image" value="{{ $dog->image }}"
               class="w-full border p-2 rounded mb-6">

        <button class="w-full py-2 bg-blue-400 text-white rounded hover:bg-blue-500">
            更新する
        </button>
    </form>

</div>
@endsection
