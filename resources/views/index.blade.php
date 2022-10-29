@extends('layouts.default')

@section('content')
<header>
    <div class="hum">
        <ul class="hum__list">
            <li><a href="/index">home</a></li>
            <li><a href="/mypage">mypage</a></li>
            <li><a href="">logout</a></li>
        </ul>
    </div>
    <form action="/search" method="post">
        @csrf
        <select name="area_id">
            <option value="">All area</option>
            @foreach($areas as $area)
            <option value="{{$area->id}}">{{$area->area}}</option>
            @endforeach
        </select>
        <select name="genre_id">
            <option value="">All genre</option>
            @foreach($genres as $genre)
            <option value="{{$genre->id}}">{{$genre->genre}}</option>
            @endforeach
        </select>
        <input type="text" name="name">
        <button type="submit">検索</button>
    </form>
</header>
<main class="index">
    @foreach($shops as $shop)
    @include('components.shop', ['shop' => $shop])
    @endforeach
</main>
<style>
    img{
        width: 100%;
    }

    .index{
        width: 100vw;
        display: flex;
        flex-wrap: wrap;
    }
    .shop{
        width: 30%;
        margin-right: 3vw;
    }
    .shop_img{
        width: 100%;
    }
</style>

@endsection