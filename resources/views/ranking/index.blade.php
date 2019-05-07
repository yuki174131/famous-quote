@extends('layouts.app')

@section('content')
    @if (count($posts) > 0)
        @include('posts.posts', ['posts' => $posts])
    @endif
@endsection