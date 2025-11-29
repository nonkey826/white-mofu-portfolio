<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <style>
        body {
            background: #fffaf5 url('/images/wssyepa-do.jpg') repeat;
            font-family: "Hiragino Sans", "Noto Sans JP", sans-serif;
            margin: 0;
            padding: 0;
        }

        /* ヘッダー ふわふわ白もふ仕様 */
        .header {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(6px);
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
            font-size: 26px;
            font-weight: bold;
            text-decoration: none;
            color: #444;
        }

        .header__logo span {
            font-size: 30px;
        }

        /* ふわふわカード */
        .container-box {
            background: #fff;
            max-width: 900px;
            margin: 40px auto;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .section-title {
            text-align: center;
            font-size: 26px;
            margin-bottom: 30px;
        }
    </style>

    @yield('css')
</head>

<body>

<header class="header">
    <div class="header__inner">
        <a href="/" class="header__logo">
            <span>🐾</span> 白もふTodo
        </a>
    </div>
</header>

<div class="container-box">
    @yield('content')
</div>

</body>
</html>
