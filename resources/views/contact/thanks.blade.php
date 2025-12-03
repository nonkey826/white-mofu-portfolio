@extends('layouts.app')

<style>
    body {
    background: url('/images/haikei-contact.jpg') no-repeat center center/cover;
    background-attachment: fixed;
}

    .thanks-container {
        max-width: 600px;
        margin: 80px auto;
        padding: 40px;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        text-align: center;
        animation: fadein 0.6s ease;
    }

    h1 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    p {
        font-size: 16px;
        color: #555;
        margin-bottom: 30px;
    }

    a.return-btn {
        display: inline-block;
        padding: 12px 24px;
        background: #b86b5b;
        color: #fff;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        transition: 0.2s;
    }

    a.return-btn:hover {
        background: #9d5749;
    }

    @keyframes fadein {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

@section('content')
<div class="thanks-container">
    <h1>送信が完了しました！</h1>
    <p>お問い合わせありがとうございます。<br>
       内容を確認のうえ、折り返しご連絡いたします。</p>

    <a href="/contact" class="return-btn">お問い合わせフォームへ戻る</a>
</div>
@endsection
