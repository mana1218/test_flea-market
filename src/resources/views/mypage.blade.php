@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage">

    <div class="profile">
        <div class="profile__left">
            <div class="profile__img"></div>
            <div class="profile__name">
                {{ auth()->user()->name }}
            </div>
        </div>

        <a href="/mypage/profile" class="edit-btn">
            プロフィールを編集
        </a>
    </div>

    <nav class="tab">
        <a href="/mypage?page=sell" class="sell">
            出品した商品
        </a>
        <a href="/mypage?page=buy" class="buy">
            購入した商品
        </a>
    </nav>

    <div class="items">
        @foreach ($items as $item)
            <div class="card">
                <div class="card__img">
                    <img src="{{ asset($item->picture) }}" alt="">
                </div>
                <p class="card__name">{{ $item->name }}</p>
            </div>
        @endforeach
    </div>

</div>
@endsection