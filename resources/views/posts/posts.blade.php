
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
            </div>
        </li>
    @endforeach
</ul>
{{ $posts->render('pagination::bootstrap-4') }}