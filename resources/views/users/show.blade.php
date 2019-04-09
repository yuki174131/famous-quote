@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <h3 class="card-title">{{ $user->name }}</h3>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="#" class="nav-link">自分の投稿</a></li>
                <li class="nav-item"><a href="#" class="nav-link">ﾀ ｲ ﾑ ﾗ ｲ ﾝ</a></li>
                <li class="nav-item"><a href="#" class="nav-link">フォロー</a></li>
                <li class="nav-item"><a href="#" class="nav-link">お気に入り</a></li>
            </ul>
        </div>
    </div>
@endsection