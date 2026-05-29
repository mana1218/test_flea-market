@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')

<form action="/purchase/{{ $item->id }}" method="post">
    @csrf
    <div class="purchase-container">
        <div class="purchase-left">
            <div class="item-summary">
                <img src="{{ asset('storage/' . $item->picture) }}" class="item-image">
                <div class="item-info">
                    <h2 class="item-name">{{ $item->name }}</h2>
                    <p class="item-price">
                        ¥{{ number_format($item->price) }}
                    </p>
                </div>
            </div>

            <hr>

            <div class="section">
                <div class="payment">
                    <h3>支払い方法</h3>
                    <select name="payment_method" class="select-box">
                        <option value="" disabled selected>選択してください</option>
                        <option value="convenience">コンビニ払い</option>
                        <option value="card">カード支払い</option>
                    </select>
                </div>

                <div class="error">
                    @error('payment_method')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <hr>

            <div class="section">
                <div class="shipping-top">
                    <h3>配送先</h3>
                    <a href="/purchase/address/{{ $item->id }}" class="change-address">変更する</a>
                </div>
                <div class="shipping-bottom">
                    <p>〒 {{ $address->postal_code }}</p>
                    <p>{{ $address->address }}</p>
                    <p>{{ $address->building }}</p>
                </div>
            </div>
        </div>

        <div class="purchase-right">
            <div class="summary-box">
                <div class="summary-row">
                    <span>商品代金</span>
                    <span>¥{{ number_format ($item->price) }}</span>
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
</form>

@endsection