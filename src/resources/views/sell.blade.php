@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell">

    <h2 class="title">商品の出品</h2>

    <form action="/sell" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>商品画像</label>
            <div class="image-box">
                <img class="item-image">
                <label for="picture" class="image-select-button">画像を選択する</label>
                <input type="file" id="picture" name="picture" accept=".jpeg,.png" hidden>
            </div>
        </div>

        <h3 class="sub-title">商品の詳細</h3>

        <div class="form-group">
            <label>カテゴリー</label>
            <div class="categories">
                @foreach ($categories as $category)
                    <input type="checkbox" class="category-input" id="category{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
                    <label for="category{{ $category->id }}" class="category-label">
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>商品の状態</label>
            <select name="condition_id" class="condition">
                <option value="" disabled selected>選択してください</option>
                @foreach ($conditions as $condition)
                    <option value="{{ $condition->id }}">
                        {{ $condition->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <h3 class="sub-title">商品名と説明</h3>

        <div class="form-group">
            <label>商品名</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>ブランド名</label>
            <input type="text" name="brand" value="{{ old('brand') }}">
        </div>

        <div class="form-group">
            <label>商品の説明</label>
            <textarea name="explain">{{ old('explain') }}</textarea>
        </div>

        <div class="form-group">
            <label>販売価格</label>
            <input type="text" name="price" placeholder="¥" value="{{ old('price') }}">
        </div>

        <button type="submit" class="submit-btn">
            出品する
        </button>

    </form>

</div>
@endsection