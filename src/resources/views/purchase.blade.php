@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')

<div class="purchase-container">
    <div class="purchase-left">
        <div class="item-summary">
            <img src="{{ asset('storage/' . $item->image) }}" class="item-image">
            <div class="item-info">
                <h2 class="item-name">{{ $item->name }}</h2>
                <p class="item-price">
                    ¥{{ number_format($item->price) }}
                </p>
            </div>
        </div>
        <hr>
        {{-- 支払い方法 --}}
        <div class="section">
            <h3>支払い方法</h3>
            <select name="payment_method" class="select-box">
                <option value="">選択してください</option>
                <option value="convenience">コンビニ払い</option>
                <option value="card">カード支払い</option>
            </select>
        </div>
        <hr>
        <div class="section">
            <h3>配送先</h3>
            <p>〒 {{ $address->postal_code }}</p>
            <p>{{ $address->address }}</p>
            <p>{{ $address->building }}</p>
            <a href="/address/edit" class="change-link">変更する</a>
        </div>
    </div>

    <div class="purchase-right">
        <div class="summary-box">
            <div class="summary-row">
                <span>商品代金</span>
                <span>¥{{ number_format($item->price) }}</span>
            </div>
            <div class="summary-row">
                <span>支払い方法</span>
                
            </div>
        </div>
        <button class="purchase-btn">
            購入する
        </button>
    </div>
</div>

@endsection