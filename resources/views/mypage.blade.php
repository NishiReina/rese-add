@extends('layouts.default')

@section('content')
<main class="mypage")>
    <div class="shops">
        <p>お気に入り店舗</p>
        @isset($likes)
        @foreach($likes as $like)
        @include('components.shop', ['shop' => $like->shop])
        @endforeach
        @endisset
    </div>
    <div class="reserves">
        @foreach($reserves as $reserve)
        <div class="reserve">
            <form action="{{ route('reserve.update', ['id' => $reserve->id]) }}" method='post'>
                @csrf
                @error('date')
                <p>{{$message}}</p>
                @enderror
                <label>
                    日付：
                    <input name='date' type="date" value="{{$reserve->date}}">
                </label><br>
                @error('time')
                <p>{{$message}}</p>
                @enderror
                <label>
                    時間：
                    <input name='time' type="time" value="{{$reserve->time}}">
                </label><br>
                @error('num')
                <p>{{$message}}</p>
                @enderror
                <label>
                    人数：
                    <input name='num' type="number" value="{{$reserve->num}}">
                </label><br>
                <button type="submit">予約変更</button>
            </form>
            <form action="{{ route('reserve.delete', ['id' => $reserve->id]) }}" method='post'>
            @csrf
                <button>キャンセル</button>
            </form>
        </div>
        @endforeach
    </div>
</main>

@endsection

<style>
    .mypage{
        display: flex;
    }

    .reserve{
        background-color: #005566;
        border-radius: 28px;
        padding: 30px;
        margin-bottom: 30px;
    }
</style>