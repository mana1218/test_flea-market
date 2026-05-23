@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<div class="detail">

    <div class="detail-image">
        <img src="{{ asset('storage/' . $item->picture) }}">
    </div>

    <div class="detail-content">
        <h1 class="item-name">{{ $item->name }}</h1>

        <p class="brand">{{ $item->brand }}</p>

        <p class="price">
            ¥{{ number_format($item->price) }}
            <span>(税込)</span>
        </p>

        <div class="reaction">
            <div class="reaction-nice">
                @if ($item->isNicedByAuthUser())
                    <form action="/item/{{ $item->id }}/nice" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit">
                            <img src="{{ asset('images/heart_pink.png') }}" alt="送信">
                        </button>
                    </form>
                @else
                    <form action="/item/{{ $item->id }}/nice" method="post">
                        @csrf
                        <button type="submit">
                            <img src="{{ asset('images/heart_default.png') }}" alt="送信">
                        </button>
                    </form>
                @endif
                <p>{{ $item->nices_count }}</p>
            </div>

            <div class="reaction-comment">
                <img src="{{ asset('images/comment.png') }}" class="reaction-icon">
                <p>{{ $item->comments_count }}</p>
            </div>
        </div>
        <a href="/purchase/{{ $item->id }}" class="purchase-btn">購入手続きへ</a>

        <h2>商品説明</h2>

        <div class="description">
            <p>{{ $item->explain }}</p>
        </div>

        <h2>商品の情報</h2>

        <div class="item-info">
            <div class="info-row">
                <span class="label">カテゴリー</span>
                @foreach ($item->categories as $category)
                    <span class="category-tag">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>
            
            <div class="info-row">
                <span class="label">商品の状態</span>
                <span>{{ $item->condition->name }}</span>
            </div>
        </div>

        <h2>コメント({{ $item->comments_count }})</h2>

        @foreach ($item->comments as $comment)
            <div class="comment-user">
                <div class="user-icon"></div>
                <p>{{ $comment->user->name }}</p>
            </div>
            <div class="comment">{{ $comment->comment }}</div>
        @endforeach

        <form action="/item/{{ $item->id }}/comment" method="post">
            @csrf
            <label class="comment-label">
                商品へのコメント
            </label>
            <textarea name="comment">{{ old('comment') }}</textarea>
            <button class="comment-btn">
                コメントを送信する
            </button>
        </form>
    </div>

</div>

@endsection