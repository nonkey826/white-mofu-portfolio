@extends('layouts.admin')

@section('content')

<style>
    /* 詳細カード全体 */
    .detail-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        padding: 30px;
        margin-top: 20px;
    }

    /* テーブル */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th {
        width: 150px;
        background: #e9f1ff;
        color: #333;
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dfeaff;
        font-weight: bold;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #f0f4ff;
        background: #fff;
    }

    /* ボタン */
    .back-btn, .delete-btn {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 6px;
        font-size: 0.95rem;
        text-decoration: none;
        margin-top: 20px;
    }

    .back-btn {
        background: #f0f4ff;
        color: #4a8bdc;
        border: 1px solid #d0def7;
    }

    .back-btn:hover {
        background: #e3ecff;
    }

    .delete-btn {
        background: #e74c3c;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .delete-btn:hover {
        background: #d84332;
    }

    /* 下部のボタン並び */
    .btn-area {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }
</style>


<h2 class="text-lg font-semibold text-gray-700 mb-6">お問い合わせ詳細</h2>

<div class="detail-card">

    <table>
        <tr>
            <th>ID</th>
            <td>{{ $contact->id }}</td>
        </tr>

        <tr>
            <th>名前</th>
            <td>{{ $contact->name }}</td>
        </tr>

        <tr>
            <th>メール</th>
            <td>{{ $contact->email }}</td>
        </tr>

        <!-- <tr>
            <th>電話番号</th>
            <td>{{ $contact->tel }}</td>
        </tr> -->

        <tr>
            <th>内容</th>
            <td>{{ $contact->content }}</td>
        </tr>
    </table>

    <div class="btn-area">
        {{-- 戻るボタン --}}
        <a href="{{ route('admin.contacts.index') }}" class="back-btn">← 一覧へ戻る</a>

        {{-- 削除ボタン --}}
        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
              onsubmit="return confirm('本当に削除しますか？')">
            @csrf
            @method('DELETE')
            <button class="delete-btn">削除</button>
        </form>
    </div>

</div>

@endsection

