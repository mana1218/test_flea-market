@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')
<div class="address">
    <div class="address__inner">
        <h2 class="address__title">住所の変更</h2>
        <form action="" class="address__form" method="">
            <div class="form__group">
                <label>郵便番号</label>
                <input type="text" name="" value="">
            </div>
            <div class="form__group">
                <label>住所</label>
                <input type="text" name="" value="">
            </div>
            <div class="form__group">
                <label>建物名</label>
                <input type="text" name="" value="">
            </div>
            <button class="update-button" type="submit">更新する</button>
        </form>
    </div>
</div>
@endsection