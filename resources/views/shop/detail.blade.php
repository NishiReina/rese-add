@extends('layouts.default')

@section('content')
<main class="detail">
    <div class="shop">
        <div class="shop__img">
            <img src="{{$shop->image_url}}" alt="{{$shop->name}}">
        </div>
        <p class="shop__name">{{$shop->name}}</p>
        <div class="shop__relation">
            <span class="shop__area">{{$shop->area->area}}</span>
            <span class="shop__genre">{{$shop->genre->genre}}</span>
        </div>
        <p class="shop__text">{{$shop->description}}</p>
        <div class="shop__like">
            @if($shop->getLiked())
            <form action="{{ route('like.delete', ['shop_id' => $shop->id] )}}" method="post">
                @csrf
                <button>いいね解除</button>
            </form>
            @else
            <form action="{{ route('like.store', ['shop_id' => $shop->id]) }}" method="post">
                @csrf
                <button>いいね</button>
            </form>
            @endif
        </div>
        <div class="reserve">
            <form action="{{ route('reserve', ['shop_id' => $shop->id]) }}" method="post">
                    @csrf
                    <input name='date' type="date">
                    <input name='time' type="time">
                    <input name='num' type="number">
                    <button type="submit">予約</button>
            </form>
        </div>
    </div>
</main>

@endsection