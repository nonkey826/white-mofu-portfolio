@extends('layouts.app')

@section('title', 'Todo一覧')

@section('content')
    <h1>Todo一覧</h1>

    @foreach($todos as $todo)
        <p>内容：{{ $todo->content }}（カテゴリ：{{ $todo->category->name ?? '未設定' }}）</p>
    @endforeach
@endsection
