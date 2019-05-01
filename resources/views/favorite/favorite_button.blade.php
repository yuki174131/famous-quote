    @if (Auth::user()->is_favoriting($postId))
        {!! Form::open(['route' => ['favorites.unfavorite', $postId], 'method' => 'delete', 'class' => 'form-inline']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $postId, 'class' => 'form-inline']]) !!}
            {!! Form::submit('favorite', ['class' => "btn btn-warning btn-sm"]) !!}
        {!! Form::close() !!}
    @endif