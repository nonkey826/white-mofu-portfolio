@extends('layouts.app')

@section('content')
<div class="container">
    <h1>メンバー一覧</h1>

    <a href="{{ route('members.create') }}" class="btn btn-primary">＋ メンバー追加</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>学習時間</th>
                <th>コメント</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->learning_hours }} 時間</td>
                <td>{{ $member->comment }}</td>
                <td>
                    <a href="{{ route('members.show', $member) }}" class="btn btn-info btn-sm">詳細</a>
                    <a href="{{ route('members.edit', $member) }}" class="btn btn-warning btn-sm">編集</a>

                    <form action="{{ route('members.destroy', $member) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('削除しますか？')">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
