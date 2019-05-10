

@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-3">
            <h3 class="card-title">{{ $user->name }}</h3>
        </aside>
        <div class="col-sm-9">
            @include('users.navtabs', ['user' => $user])
            <div class="tab-content">
                    @if (count($posts) > 0)
                        @include('posts.posts', ['posts' => $posts])
                    @endif
            </div>
        </div>
    </div>
@endsection