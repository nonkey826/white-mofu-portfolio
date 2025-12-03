@extends('layouts.app')

<style>

    body {
    background: url('/images/haikei-contact.jpg') no-repeat center center/cover;
    background-attachment: fixed;
}
    /* body {
        background: #faf6f1;
    } */

    .contact-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #333;
    }

    .contact-container {
        max-width: 650px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
        color: #444;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        margin-bottom: 20px;
    }

    button[type="submit"] {
        background: #98514B;
        color: #fff;
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.2s;
    }

    button[type="submit"]:hover {
        background: #988280;
    }

    .success-message {
        background: #E8F8EC;
        border-left: 6px solid #4CAF50;
        padding: 12px 18px;
        margin-bottom: 25px;
        border-radius: 6px;
        color: #2E7D32;
    }
</style>

@section('content')
<div class="contact-container">

    <h2 class="contact-title">お問い合わせ</h2>

    {{-- ★エラーはフォームの上に表示！！ --}}
    @if ($errors->any())
        <div style="background:#ffe6e6; border-left:6px solid #ff4d4d; padding:15px; margin-bottom:20px; border-radius:8px;">
            <ul style="margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li style="color:#cc0000;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- successメッセージ --}}
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="/contact/confirm" method="post">
        @csrf

        <label>お名前</label>
        <input 
            type="text" 
            name="name"
            placeholder="山田太郎"
            value="{{ old('name') }}"
        >

        <label>メールアドレス</label>
        <input 
            type="email" 
            name="email"
            placeholder="example@example.com"
            value="{{ old('email') }}"
        >

        <label>お問い合わせ内容</label>
        <textarea 
            name="message" 
            rows="4"
            placeholder="お問い合わせ内容をご記入ください"
        >{{ old('message') }}</textarea>

        <button type="submit">送信</button>
    </form>

    <div style="text-align:center; margin-top:25px;">
    <a href="{{ url('/') }}" 
       style="
            display:inline-block;
            padding:10px 20px;
            background:#777;
            color:#fff;
            text-decoration:none;
            border-radius:8px;
            font-size:15px;
            transition:0.2s;
       ">
        ← TOPページに戻る
    </a>
</div>

</div>

@endsection
