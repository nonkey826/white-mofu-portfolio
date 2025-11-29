@extends('layouts.app')

@section('title', '推しもふ結果')

@section('content')
<style>
  .result-wrap {
    max-width: 600px;
    margin: 60px auto;
    text-align: center;
    font-family: -apple-system, BlinkMacSystemFont, "Helvetica Neue",
      "YuGothic", "游ゴシック体", sans-serif;
  }
  .result-title {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 24px;
  }
  .result-dog {
    font-size: 18px;
    margin-bottom: 16px;
  }
  .btn-row {
    margin-top: 24px;
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
  }
  .btn {
    display: inline-block;
    padding: 8px 18px;
    border-radius: 999px;
    text-decoration: none;
    font-size: 14px;
  }
  .btn-show {
    background: #ffb6c1;
    color: #fff;
  }
  .btn-back {
    background: #ddd;
    color: #333;
  }
</style>

<div class="result-wrap">
  @if ($dog)
    <div class="result-title">
      あなたの推しもふは<br>
      「{{ $dog->name }}」です🐾
    </div>

    <div class="result-dog">
      犬種：{{ $dog->breed }} ／ 年齢：{{ $dog->age }}才
    </div>

    <div class="btn-row">
      <a href="{{ route('dogs.show', $dog->id) }}" class="btn btn-show">
        この子の詳細を見る
      </a>
      <a href="{{ route('dogs.index') }}" class="btn btn-back">
        白もふ図鑑に戻る
      </a>
    </div>
  @else
    <div class="result-title">
      まだ推しもふが選ばれていません🐶
    </div>
    <div class="btn-row">
      <a href="{{ route('dogs.index') }}" class="btn btn-back">
        白もふ図鑑に戻る
      </a>
    </div>
  @endif
</div>
@endsection
