@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<nav class="tab">
    <a href="/?keyword={{ request('keyword') }}" class="{{ request('tab') !== 'mylist' ? 'active' : 'mylist' }}">おすすめ</a>
    <a href="/?tab=mylist&keyword={{ request('keyword') }}" class="{{ request('tab') === 'mylist' ? 'active' : 'mylist' }}">マイリスト</a>
</nav>

<div class="items">
    @foreach ($items as $item)
    <a href="/item/{{ $item->id }}" class="card">

        <div class="card-wrapper">
            <img src="{{ asset('storage/' . $item->picture) }}" alt="{{ $item->name }}">
            @if ($item->sold)
                <div class="sold-label">SOLD</div>
            @endif
        </div>
        <p>{{ $item->name }}</p>
        
    </a>
    @endforeach
</div>
@endsection