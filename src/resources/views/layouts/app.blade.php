<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '白もふ図鑑')</title>

    @yield('css')   {{-- ← これを追加！ --}}

    <style>
        body {
            background: #fffaf5 url('/images/bg_paws.png') repeat;
            font-family: "Hiragino Sans", "Noto Sans JP", sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-box {
            background: white;
            max-width: 700px;
            margin: 40px auto;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .title-center {
            text-align: center;
            font-size: 28px;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="container-box">
        @yield('content')
    </div>
</body>
</html>
