@extends('layouts.app')

@section('content')

<h1>名言カテゴリ一覧</h1>

<ul>
    <li>{!! link_to_route('categories.show','歴史上の人物の名言', 'history') !!}</li>
    <li>{!! link_to_route('categories.show','スポーツ関係の名言', 'sports') !!}</li>
    <li>{!! link_to_route('categories.show','ビジネス関係の名言', 'business') !!}</li>
    <li>{!! link_to_route('categories.show','漫画・アニメで生まれた名言', 'anime') !!}</li>
    <li>{!! link_to_route('categories.show','その他の名言', 'other') !!}</li>
</ul>

@endsection