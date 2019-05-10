@extends('layouts.app')

@section('content')
    
    <h1 class="mb-4">名言お気に入りランキング</h1>
    
    @if (count($posts) > 0)
        @include('posts.posts', ['posts' => $posts])
    @endif
@endsection