@extends('layouts.app')

@section('content')

<h1>名言カテゴリ一覧</h1>

<ul>
    @foreach ($categories as $category)
        <li>{{ $category->content }}</li>
    @endforeach
</ul>

@endsection