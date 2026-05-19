@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('nav')
<nav class="tab">
    <a href="" class="active">おすすめ</a>
    <a href="" class="mylist">マイリスト</a>
</nav>
@endsection

@section('content')
<div class="items">
    @foreach ($items as $item)
    <a href="/item/{{ $item->id }}" class="card">
        <img src="{{ asset('storage/' . $item->picture) }}" alt="{{ $item->name }}">
        <p>{{ $item->name }}</p>
    </a>
@endforeach
</div>
@endsection