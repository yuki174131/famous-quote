@extends('layouts.app')

@section('content')

<h1>名言カテゴリ一覧</h1>

<ul>
    @foreach ($categories as $category)
        <li class=row>
            <a href="{{ route('category.posts.index', [ $category->id ]) }}">{{ $category->content }} @include('category_follow.follow_button', ['category' => $category])</a>
        </li>
    @endforeach
</ul>

@endsection