@extends('layouts.admin')

@section('content')

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
