@extends('layouts.app')

@section('content')

<h1>名言カテゴリ一覧</h1>

<ul>
    @foreach ($categories as $category)
        <li>
            <a href="{{ route('category.posts.index', [ $category->id ]) }}">{{ $category->content }}</a>
        </li>
    @endforeach
</ul>

@endsection