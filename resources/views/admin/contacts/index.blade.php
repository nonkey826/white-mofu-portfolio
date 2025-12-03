@extends('layouts.admin')


@section('content')

<style>
    /* 管理画面の背景 */
    body {
        background: #f2f7ff; /* 薄いブルー系 */
        font-family: "Hiragino Sans", "Noto Sans JP", sans-serif;
        margin: 0;
        padding: 0;
    }

    /* ヘッダー */
    header {
        background: #fff;
        border-bottom: 2px solid #d8e7ff;
        padding: 14px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        font-size: 1.4rem;
        font-weight: bold;
        color: #4a8bdc; /* 優しいブルー */
    }

    nav a {
        margin-left: 15px;
        text-decoration: none;
        color: #4a8bdc;
        font-size: 0.95rem;
    }

    nav a:hover {
        text-decoration: underline;
    }

    /* 管理画面の白いボックス */
    .admin-container {
        background: #ffffff;
        max-width: 1000px;
        margin: 40px auto;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0px 6px 16px rgba(0, 0, 0, 0.08);
    }

    /* テーブル補強（壊れないようにシンプル） */
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    thead {
        background: #e9f1ff;
        color: #333;
        font-weight: bold;
    }

    th, td {
        padding: 12px 10px;
        border-bottom: 1px solid #eee;
    }

    tr:hover {
        background: #f7fbff;
    }

    /* ヘッダーと中身の間に余白をつける */
.admin-container {
    margin-top: 40px !important;   /* ←ここで離す */
}

/* お問い合わせ一覧の位置を中央に寄せる */
.admin-wrapper {
    max-width: 1000px;
    margin: 0 auto;   /* ←中央寄せ */
    padding: 0 20px;
}

/* テーブル全体をカード風にまとめる */
.admin-card {
    background: #fff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    margin-top: 20px;
}

</style>


<h2 class="text-lg font-semibold text-gray-700 mb-6">お問い合わせ一覧</h2>

<table class="w-full border-collapse text-sm">
    <thead>
    <tr class="bg-gray-50 border-b">
        <th class="py-3 px-3 text-left">ID</th>
        <th class="py-3 px-3 text-left">名前</th>
        <th class="py-3 px-3 text-left">メール</th>
        <th class="py-3 px-3 text-left">内容</th>
        <th class="py-3 px-3 text-left">詳細</th>
        <th class="py-3 px-3 text-left">削除</th>
    </tr>
    </thead>

    <tbody>
    @foreach($contacts as $contact)
        <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-3">{{ $contact->id }}</td>
            <td class="py-3 px-3">{{ $contact->name }}</td>
            <td class="py-3 px-3">{{ $contact->email }}</td>
            <td class="py-3 px-3">{{ Str::limit($contact->content, 20) }}</td>
            <td class="py-3 px-3">
                <a href="{{ route('admin.contacts.show', $contact->id) }}"
                   class="text-blue-500 hover:underline">
                    詳細
                </a>
            </td>
            <td class="py-3 px-3">
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                      method="POST"
                      onsubmit="return confirm('本当に削除しますか？')">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                        削除
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
