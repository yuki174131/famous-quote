
<ul class="list-unstyled">
    @foreach ($posts as $post)
        <li class="media mb-3 border rounded">
            <div class="media-body">
                <div>
                    <p>投稿者：{{ $post->user->name }} <span class="text-muted ml-3">posted at {{ $post->created_at }}</span></p>
                </div>
                <div>
                    <p>人物：{{ $post->name }}</p>
                </div>   
                <div class="mt-4">
                    <p class="mb-2">名言：</p>
                    <p>{!! nl2br(e($post->content)) !!}</p>
                </div>
                <div class="bg-light btn-toolbar p-2">
                    <div class="btn-group ml-2">
                        @include('favorite.favorite_button', ['postId' => $post->id])
                        {{-- <span class="badge badge-secondary">{{ $count_posts_favorites }}</span> --}}
                    </div>
                    <div class="btn-group ml-2">
                        @if (Auth::id() == $post->user_id)
                            {!! link_to_route('category.posts.edit', '編集', ['id' => $post->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                        @endif
                    </div>
                    <div class="btn-group ml-2">
                        @if (Auth::id() == $post->user_id)
                            {!! Form::open(['route' => ['category.posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $posts->render('pagination::bootstrap-4') }}