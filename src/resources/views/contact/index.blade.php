<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>白もふ管理画面</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

<header class="bg-white shadow-sm">
    <div class="max-w-5xl mx-auto px-6 lg:px-8 py-4 flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                🐾 白もふ管理画面
            </h1>
            <p class="text-xs text-gray-500 ml-6">
                さんた＆こたろーの推しもふデータ管理
            </p>
        </div>

        <nav class="flex items-center gap-6 text-sm">
            <a href="{{ route('dogs.index') }}" class="text-gray-600 hover:text-blue-500">
                🐶 犬一覧
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="text-gray-600 hover:text-blue-500">
                ✉️ お問い合わせ一覧
            </a>
        </nav>
    </div>
</header>


{{-- ★★★ ここを中央 & 幅固定にする！ ★★★ --}}
<div class="max-w-5xl mx-auto px-6 pt-10 pb-20">

    <div class="bg-white shadow-md rounded-xl p-8 w-full">
        @yield('content')
    </div>

</div>

<footer class="text-center text-xs py-6 text-gray-500">
    © 2025 白もふ兄弟 管理画面
</footer>

</body>
</html>
