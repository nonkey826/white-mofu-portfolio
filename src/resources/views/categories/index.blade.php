@extends('layouts.app')

@section('title', '白もふカテゴリ一覧')

@section('css')
<link rel="stylesheet" href="/css/category.css">
@endsection

@section('content')
<div class="category-container">

    <h1 class="page-title">🐶 白もふカテゴリ一覧</h1>

    {{-- 成功メッセージ --}}
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    {{-- 新規カテゴリ追加フォーム --}}
    <form action="{{ route('categories.store') }}" method="POST" class="create-form">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" placeholder="カテゴリ名（10文字以内）" class="input-text">

        <button class="btn-add">追加</button>
    </form>

    {{-- エラー --}}
    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 一覧表示 --}}
    <table class="category-table">
        <tr>
            <th>ID</th>
            <th>カテゴリ名</th>
            <th>操作</th>
        </tr>

        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td class="actions">

                {{-- 編集 --}}
                <form action="{{ route('categories.update') }}" method="POST" class="inline-form">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <input type="text" name="name" value="{{ $category->name }}" class="edit-input">
                    <button class="btn-edit">更新</button>
                </form>

                {{-- 削除 --}}
                <form action="{{ route('categories.destroy') }}" method="POST" class="inline-form">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <button class="btn-delete">削除</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
