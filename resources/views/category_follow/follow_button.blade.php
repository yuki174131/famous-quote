    @if (Auth::user()->is_following($category->id))
        {!! Form::open(['route' => ['categories.unfollow', $category->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfollow', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['categories.follow', $category->id]]) !!}
            {!! Form::submit('Follow', ['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
    @endif