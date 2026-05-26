@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<nav class="tab">
    <a href="/" class="active">おすすめ</a>
    <a href="/?tab=mylist" class="mylist">マイリスト</a>
</nav>

<div class="items">
    @foreach ($items as $item)
    <a href="/item/{{ $item->id }}" class="card">

        @if ($item->sold)
        <div class="sold-label">SOLD</div>
        @endif

        <img src="{{ asset('storage/' . $item->picture) }}" alt="{{ $item->name }}">
        <p>{{ $item->name }}</p>
        
    </a>
    @endforeach
</div>
@endsection