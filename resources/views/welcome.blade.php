@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('categories.index')
    @else
        <div class="center jumbotron mb-0">
            <div class="text-center">
                <h1>ようこそ<br>名言コレクションへ</h1>
                <div class="mt-3">
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
                <div class="mt-3">
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
                <p class="text-right mt- mb-0"><a href="{{ route('categories.index') }}">ゲストログイン</a></p>
            </div>
        </div>
        <div class="bg-primary text-white pl-4 pt-2 pb-2">
        <p>名言に触れて日々のモチベーションを上げよう</p>
        <p>お気に入りの名言を見つけよう</p>
        <p>好きな名言を投稿しよう</p>
        </div>
    @endif
@endsection