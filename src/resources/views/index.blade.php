@extends('layouts.app')

@section('title', 'Todo一覧')

@section('content')


<form class="create-form" action="/todos" method="post">
  @csrf
  <div class="create-form__item">
    <input class="create-form__item-input" type="text" name="content" placeholder="Todoを入力" value="{{ old('content') }}">

    <select class="create-form__item-select" name="category_id">
        <option value="">カテゴリを選択</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
  </div>

  <div class="create-form__button">
    <button class="create-form__button-submit" type="submit">作成</button>
  </div>
</form>

<form class="search-form" action="/todos/search" method="GET">
    <div class="search-form__item">
        <input type="text" name="keyword" placeholder="キーワード" value="{{ request('keyword') }}">

        <select name="category_id">
            <option value="">全カテゴリ</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    @if(request('category_id') == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">検索</button>
    </div>
</form>


    <h1>Todo一覧</h1>

    @foreach($todos as $todo)
        <p>内容：{{ $todo->content }}（カテゴリ：{{ $todo->category->name ?? '未設定' }}）</p>
    @endforeach
@endsection
