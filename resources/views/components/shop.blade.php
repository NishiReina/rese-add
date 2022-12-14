<div class="shop">
        <div class="shop__img">
            <img src="{{$shop->image_url}}" alt="{{$shop->name}}">
        </div>
        <p class="shop__name">{{$shop->name}}</p>
        <div class="shop__relation">
            <span class="shop__area">{{$shop->area->area}}</span>
            <span class="shop__genre">{{$shop->genre->genre}}</span>
        </div>
        <a href="/shop/{{$shop->id}}">詳しく見る</a>
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
</div>
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