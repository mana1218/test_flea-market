@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile">

    <div class="profile__inner">
        <h2 class="profile__title">プロフィール設定</h2>
        <form action="" class="profile__form" method="" enctype="multipart/form-data">
            @csrf
            <div class="form__image">
                <img class="profile-image">
                <label for="picture" class="image-select-button">画像を選択する</label>
                <input type="file" id="picture" name="picture" accept=".jpeg,.png" hidden>
            </div>

            <div class="form__group">
                <label for="">ユーザー名</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>

            <div class="form__group">
                <label for="">郵便番号</label>
                <input type="text" name="postal_code" value="{{ old('postal_code') }}">
            </div>

            <div class="form__group">
                <label for="">住所</label>
                <input type="text" name="address" value="{{ old('address') }}">
            </div>

            <div class="form__group">
                <label for="">建物名</label>
                <input type="text" name="building" value="{{ old('building') }}">
            </div>
            
            <button class="update-btn" type="submit">更新する</button>
        </form>
    </div>

</div>
@endsection