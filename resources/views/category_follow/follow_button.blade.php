    @if (Auth::user()->is_following($category->id))
        {!! Form::open(['route' => ['categories.unfollow', $category->id], 'method' => 'delete']) !!}
            {!! Form::submit('フォローを解除', ['class' => "btn btn-danger btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['categories.follow', $category->id]]) !!}
            {!! Form::submit('フォローする', ['class' => "btn btn-primary btn-sm"]) !!}
        {!! Form::close() !!}
    @endif