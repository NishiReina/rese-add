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

</main>

@endsection