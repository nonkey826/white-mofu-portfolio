@extends('layouts.common')

@section('title', '白もふポータル')

@section('content')



<div style="text-align: center; padding: 40px 20px;">


    {{-- タイトル --}}
    <h1 style="
        font-size: 2rem;
        font-weight: bold;
        color: #555;
        margin-bottom: 40px;
    ">
        🐾 白もふポータルへようこそ 🐾
    </h1>

    {{-- 説明文 --}}
    <p style="
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 40px;
        line-height: 1.8;
    ">
        さんた と こたろー のふわふわ世界へようこそ！<br>
        下から使いたいアプリを選んでね。
    </p>

    {{-- メニューカード全体 --}}
    <div style="
        display: flex;
        justify-content: center;
        gap: 40px;
        flex-wrap: wrap;
    ">

        {{-- 白もふ図鑑カード --}}
        <a href="/dogs" style="
            width: 260px;
            background: #fff8f2;
      
            border-radius: 20px;
            padding: 25px;
            text-decoration: none;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.12);
            border: 1px solid #eee;
            transition: 0.3s;
            display: block;
        "
        onmouseover="this.style.transform='translateY(-6px)'"
        onmouseout="this.style.transform='translateY(0)'">

            <h2 style="
                font-size: 1.5rem;
                font-weight: 700;
                color: #555;
                margin-bottom: 15px;
            ">🐶 白もふ図鑑</h2>

            <p style="
                color: #555;
                font-size: 1rem;
                line-height: 1.6;
            ">
                さんた & こたろー の図鑑を見たり、
                新しい犬を登録できるよ！
            </p>
        </a>

        {{-- Todoアプリカード --}}
        <a href="/todos" style="
            width: 260px;
            /* background: #ffffff; */
            background: #fff8f2;
            border-radius: 20px;
            padding: 25px;
            text-decoration: none;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.12);
            border: 1px solid #eee;
            transition: 0.3s;
            display: block;
        "
        onmouseover="this.style.transform='translateY(-6px)'"
        onmouseout="this.style.transform='translateY(0)'">

            <h2 style="
                font-size: 1.5rem;
                font-weight: 700;
                color: #555;
                margin-bottom: 15px;
            ">📝 白もふTodo</h2>

            <p style="
                color: #555;
                font-size: 1rem;
                line-height: 1.6;
            ">
                やることをふわふわ管理！<br>
                カテゴリつきTodoアプリだよ。
            </p>
        </a>

        <!-- お問い合わせカード -->
<a href="/contact" style="
    width: 260px;
    background: #ffffff;
    border-radius: 20px;
    padding: 25px;
    text-decoration: none;
    box-shadow: 0px 6px 15px rgba(0,0,0,0.12);
    border: 1px solid #eee;
    transition: 0.3s;
    display: block;
" onmouseover="this.style.transform='translateY(-6px)';"
  onmouseout="this.style.transform='translateY(0)';">

    <h2 style="
        font-size: 1.5rem;
        font-weight: 600;
        color:#555;
        margin-bottom: 15px;
    ">📩 お問い合わせ</h2>

    <p style="color: #555; font-size: 1rem; line-height:1.6;">
        アプリや図鑑についてのご質問はこちら！
    </p>
</a>

{{-- Adminカード --}}
<a href="/admin/contacts" style="
    width: 260px;
    background: #F8F9FF;
    border-radius: 20px;
    padding: 25px;
    text-decoration: none;
    box-shadow: 0px 6px 15px rgba(0,0,0,0.12);
    border: 1px solid #eee;
    transition: 0.3s;
    display: block;
"
onmouseover="this.style.transform='translateY(-6px)'"
onmouseout="this.style.transform='translateY(0)'">

    <h2 style="
        font-size: 1.5rem;
        font-weight: 600;
        color:#555;
        margin-bottom: 15px;
    ">🔐 管理者ページ</h2>

    <p style="
        color: #555;
        font-size: 1rem;
        line-height: 1.6;
    ">
        白もふ図鑑・Todo・お問い合わせを
        管理する専用ページだよ。
    </p>
</a>



</div>

    </div>

    

@endsection
