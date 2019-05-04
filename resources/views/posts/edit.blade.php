@extends('layouts.app')

@section('content')
    {!! Form::model($post, ['route' => ['category.posts.update', $post->id], 'method' => 'put']) !!}
        <div class="form-group">
            <p>人物</p>{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            <p class="mt-4">名言</p>{!! Form::textarea('content', old('content'), ['class' => 'form-control mt-1', 'rows' => '3']) !!}
            {!! Form::submit('更新', ['class' => 'btn btn-primary mt-3']) !!}
        </div>
    {!! Form::close() !!}
@endsection