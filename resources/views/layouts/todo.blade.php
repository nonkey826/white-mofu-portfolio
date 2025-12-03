<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Todoアプリ')</title>

    <style>
        body {
            background: #fffaf5 url('/images/dogs/haikei-contact.jpg') repeat;
            font-family: "Hiragino Sans", "Noto Sans JP", sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background: #ffffffcc;
            backdrop-filter: blur(4px);
            border-bottom: 1px solid #eee;
            padding: 20px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .header__inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header__logo {
            font-size: 24px;
            font-weight: bold;
            color: #444;
            text-decoration: none;
        }

        .header__nav a {
            color: #666;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #ffffffee;
            backdrop-filter: blur(3px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
        }

        .title-center {
            text-align: center;
            font-size: 28px;
            margin-bottom: 25px;
            color: #444;
        }
    </style>
</head>

<body>

<header class="header">
    <div class="header__inner">
        <a href="/" class="header__logo">🐾 Todo管理</a>

        <nav class="header__nav">
            <a href="{{ url('/') }}">Todo一覧</a>
            <a href="{{ url('/categories') }}">カテゴリ</a>
        </nav>
    </div>
</header>

<div class="container">
    @yield('content')
</div>

</body>
</html>
