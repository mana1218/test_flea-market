@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')
<div class="address">
    <div class="address__inner">
        <h2 class="address__title">住所の変更</h2>
        <form action="/purchase/address/{{ $item->id }}" class="address__form" method="post">
            @method('patch')
            @csrf
            <div class="form__group">
                <label>郵便番号</label>
                <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}">

                <div class="error">
                    @error('postal_code')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form__group">
                <label>住所</label>
                <input type="text" name="address" value="{{ old('address', $user->address) }}">

                <div class="error">
                    @error('address')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form__group">
                <label>建物名</label>
                <input type="text" name="building" value="{{ old('building', $user->building) }}">
            </div>

            <button class="update-btn" type="submit">更新する</button>
        </form>
    </div>
</div>
@endsection