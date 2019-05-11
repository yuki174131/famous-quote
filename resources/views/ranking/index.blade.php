@extends('layouts.app')

@section('content')
    
    <h1 class="mb-4">名言お気に入りランキング</h1>
    
    <div class="card-body">
    <div class="container">
	<div class="row">
        <div class="col-sm-8">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <form action="{{ route('posts.search') }}" method="GET">
                        {{ csrf_field() }}
                        <input type="text" class="form-control input-lg" name="search" placeholder="キーワード検索">
                        <span class="input-group-btn" style="position:relative; top:-38px; right:-193px">
                            <button class="btn btn-info" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
	</div>
    </div>
    </div>
    
    @isset($search_result)
        <p>{{ $search_result }}</p>
    @endisset
    
    @if (count($posts) > 0)
        @include('posts.posts', ['posts' => $posts])
    @endif
@endsection