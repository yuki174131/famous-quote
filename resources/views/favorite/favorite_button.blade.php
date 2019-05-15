    @if (Auth::user()->is_favoriting($postId))
        {!! Form::open(['route' => ['favorites.unfavorite', $postId], 'method' => 'delete', 'class' => 'form-inline']) !!}
            {!! Form::submit('お気に入りから外す', ['class' => "btn btn-success btn-sm"]) !!}<span class="ml-1">{{ $post->favorites_count }}</span> 
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $postId, 'class' => 'form-inline']]) !!}
            {!! Form::submit('お気に入りに追加', ['class' => "btn btn-warning btn-sm"]) !!}<span class="ml-1">{{ $post->favorites_count }}</span>
        {!! Form::close() !!}
    @endif