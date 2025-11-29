@extends('layouts.common')

@section('title', '白もふTodo')

@section('content')
    <h1 class="section-title">🐾 白もふ Todo 一覧 🐾</h1>

    {{-- 検索フォーム --}}
    <form action="/todos/search" method="GET" class="search-form" style="margin-bottom:20px;">
        @csrf
        <input type="text" name="keyword" placeholder="キーワード検索" style="padding:10px; border:1px solid #ddd; border-radius:5px; width:70%;">
        <button type="submit" style="padding:10px 15px; background:#000; color:#fff; border:none; border-radius:5px; cursor:pointer;">
            検索
        </button>
    </form>

    {{-- Todo追加 --}}
    <form action="/todos" method="POST" class="create-form">
        @csrf
        <input type="text" name="content" placeholder="Todoを入力…" style="padding:10px; border:1px solid #ddd; border-radius:5px; width:70%;">
        
        <select name="category_id" style="padding:10px; border:1px solid #ddd; border-radius:5px;">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit" style="padding:10px 15px; background:#000; color:#fff; border:none; border-radius:5px; cursor:pointer;">
            追加
        </button>
    </form>

    {{-- Todo一覧 --}}
    <table class="todo-table" style="width:100%; margin-top:30px;">
        @foreach ($todos as $todo)
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:12px; width:60%;">{{ $todo->content }}</td>
                <td style="padding:12px; width:20%; color:#777;">{{ $todo->category->name }}</td>

                {{-- 更新 --}}
                <td style="padding:12px; width:10%;">
                    <form action="/todos/update" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $todo->id }}">
                        <button style="padding:6px 12px; background:#0000ff; color:white; border:none; border-radius:4px;">
                            更新
                        </button>
                    </form>
                </td>

                {{-- 削除 --}}
                <td style="padding:12px; width:10%;">
                    <form action="/todos/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $todo->id }}">
                        <button style="padding:6px 12px; background:#ff0000; color:white; border:none; border-radius:4px;">
                            削除
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
