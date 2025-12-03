@extends('layouts.app')

<style>
    body {
    background: url('/images/haikei-contact.jpg') no-repeat center center/cover;
    background-attachment: fixed;
}

    .confirm-container {
        max-width: 650px;
        margin: 60px auto;
        padding: 32px;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        animation: fadein 0.5s ease;
    }

    h1 {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
    }

    p.desc {
        margin-bottom: 25px;
        color: #666;
        font-size: 15px;
    }

    .item-box {
        margin-bottom: 22px;
    }

    .item-box label {
        font-weight: bold;
        color: #444;
    }

    .item-value {
        background: #f7f7f7;
        padding: 12px;
        border-radius: 8px;
        margin-top: 4px;
        white-space: pre-wrap;
    }

    .btn-area {
        margin-top: 30px;
        display: flex;
        justify-content: flex-start;
        gap: 20px;
    }

    .btn-wrapper {
        margin: 0;
    }

    .submit-btn,
    .back-btn {
        padding: 12px 28px;
        font-size: 16px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .submit-btn {
        background: #b86b5b;
        color: #fff;
    }

    .submit-btn:hover {
        background: #9d5749;
    }

    .back-btn {
        background: #ddd;
        color: #333;
    }

    .back-btn:hover {
        background: #c6c6c6;
    }


    @keyframes fadein {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

@section('content')
<div class="confirm-container">

    <h1>確認ページ</h1>
    <p class="desc">以下の内容で送信します。よろしいですか？</p>

    <div class="item-box">
        <label>お名前</label>
        <div class="item-value">{{ $inputs['name'] }}</div>
    </div>

    <div class="item-box">
        <label>メールアドレス</label>
        <div class="item-value">{{ $inputs['email'] }}</div>
    </div>

    <div class="item-box">
        <label>お問い合わせ内容</label>
        <div class="item-value">{{ $inputs['message'] }}</div>
    </div>

    <div class="btn-area">

    {{-- 送信ボタン --}}
    <form action="/contact/thanks" method="post" class="btn-wrapper">
        @csrf
        <input type="hidden" name="name" value="{{ $inputs['name'] }}">
        <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        <input type="hidden" name="message" value="{{ $inputs['message'] }}">

        <button class="submit-btn" type="submit">送信する</button>
    </form>

    {{-- 戻るボタン --}}
    <form action="/contact" method="get" class="btn-wrapper">
        <button class="back-btn" type="submit">戻る</button>
    </form>

</div>

</div>
@endsection

