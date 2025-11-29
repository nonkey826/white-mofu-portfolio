@extends('layouts.admin')

@section('title', 'お問い合わせ詳細')

@section('content')

<h2 class="text-lg font-semibold text-gray-700 mb-6 mt-2">お問い合わせ詳細</h2>

<table class="w-full border-collapse text-sm">
    <tbody>
        <tr class="border-b">
            <th class="py-3 px-3 text-left w-32 bg-gray-50">ID</th>
            <td class="py-3 px-3">{{ $contact->id }}</td>
        </tr>

        <tr class="border-b">
            <th class="py-3 px-3 text-left bg-gray-50">名前</th>
            <td class="py-3 px-3">{{ $contact->name }}</td>
        </tr>

        <tr class="border-b">
            <th class="py-3 px-3 text-left bg-gray-50">メール</th>
            <td class="py-3 px-3">{{ $contact->email }}</td>
        </tr>

        <tr class="border-b">
            <th class="py-3 px-3 text-left bg-gray-50">電話番号</th>
            <td class="py-3 px-3">{{ $contact->tel }}</td>
        </tr>

        <tr class="border-b">
            <th class="py-3 px-3 text-left bg-gray-50">内容</th>
            <td class="py-3 px-3 whitespace-pre-line">{{ $contact->content }}</td>
        </tr>
    </tbody>
</table>

<div class="mt-6 flex gap-4">
    <a href="{{ route('admin.contacts.index') }}" class="text-blue-500 underline">
        ← 一覧へ戻る
    </a>

    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
          onsubmit="return confirm('削除しますか？')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">
            削除
        </button>
    </form>
</div>

@endsection
