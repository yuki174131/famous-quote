<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('user.posts.index', ['id' => $user->id]) }}" class="nav-link">自分の投稿</a></li>
    <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link">ﾀ ｲ ﾑ ﾗ ｲ ﾝ</a></li>
    <li class="nav-item"><a href="{{ route('follow.posts.index') }}" class="nav-link">フォロー</a></li>
    <li class="nav-item"><a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/favorites') ? 'active' : '' }}">お気に入り</a></li>
</ul>