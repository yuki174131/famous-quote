@extends('layouts.app')

@section('content')
    @if(Auth::check())
        {{ Auth::user()->name }}
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>ようこそ名言コレクションへ</h1>
                <div class="mt-4">
                    {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
                <div class="mt-3">
                    {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
             </div>
        </div>
        </div>
    </div>
    @endif
@endsection