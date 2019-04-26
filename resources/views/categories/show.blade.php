@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'posts.store']) !!}
        <div class="form-group">
            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
            {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
    @if (count($posts) > 0)
        @include('posts.posts', ['posts' => $posts])
    @endif
@endsection