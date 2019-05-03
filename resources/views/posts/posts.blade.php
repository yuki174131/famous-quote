
<ul class="list-unstyled">
    @foreach ($posts as $post)
        <li class="media mb-3">
            <div class="media-body">
                <div>
                    {{ $post->user->name }} <span class="text-muted">posted at {{ $post->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{{ $post->name }}</p>
                </div>   
                <div>
                    <p class="mb-0">{!! nl2br(e($post->content)) !!}</p>
                </div>
                <div>
                    @include('favorite.favorite_button', ['postId' => $post->id])
                </div>
                <div>
                    @if (Auth::id() == $post->user_id)
                        {!! link_to_route('category.posts.edit', '編集', ['id' => $post->id], ['class' => 'btn btn-light']) !!}
                    @endif
                </div>
                <div>
                    @if (Auth::id() == $post->user_id)
                        {!! Form::open(['route' => ['category.posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $posts->render('pagination::bootstrap-4') }}