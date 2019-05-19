<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">自分の投稿</a></li>
    <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link {{ Request::is('posts') ? 'active' : '' }}">全投稿</a></li>
    <li class="nav-item"><a href="{{ route('follow.posts.index') }}" class="nav-link {{ Request::is('posts/follow') ? 'active' : '' }}">フォロー</a></li>
    <li class="nav-item"><a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/favorites') ? 'active' : '' }}">お気に入り<span class="badge badge-secondary ml-1">{{ $user_favorites }}</span></a></li>
</ul>