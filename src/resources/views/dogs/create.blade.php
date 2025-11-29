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
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold text-center mb-6">🐾 白もふを追加する 🐾</h1>

    <form method="POST" action="{{ route('dogs.store') }}">
        @csrf

        <label class="block font-bold">名前：</label>
        <input type="text" name="name"
               class="border p-2 w-full rounded mb-4" required>

        <label class="block font-bold">犬種：</label>
        <input type="text" name="breed"
               class="border p-2 w-full rounded mb-4" required>

        <label class="block font-bold">年齢：</label>
        <input type="number" name="age"
               class="border p-2 w-full rounded mb-4" required>

        <label class="block font-bold">体重：</label>
        <input type="number" name="weight"
               class="border p-2 w-full rounded mb-4" required>

        <label class="block font-bold">性格：</label>
        <input type="text" name="personality"
               class="border p-2 w-full rounded mb-4" required>

        <label class="block font-bold">好きな食べ物：</label>
        <input type="text" name="favorite_food"
               class="border p-2 w-full rounded mb-4" required>

        <label class="block font-bold">画像ファイル名（images/dogs/）：</label>
        <input type="text" name="image"
               class="border p-2 w-full rounded mb-6">

        <button class="w-full py-3 bg-pink-400 text-white rounded-lg shadow hover:bg-pink-500">
            ＋ 白もふを登録する
        </button>
    </form>
</div>
@endsection

