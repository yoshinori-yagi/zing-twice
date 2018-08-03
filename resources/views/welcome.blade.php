@extends('layouts.app')

@section('cover')
    <div class="cover">
                @if (!Auth::check())
                    <div class="sign_up">
                        <h1>Zing</h1>
                        <a href="{{ route('about.zing') }}" class="btn btn-ghost btn-lg blink">What's Zing?</a>
                        <a href="{{ route('practice', ['id' => \Auth::id()])}}">Game Practice</a>
                    </div>
                @else
                    <div class = "game_confirm">
                        <h2>Timeline</h2>
                        <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
                        <h3 class="information">explanation</h3>
                    </div>
                @endif
    </div>
@endsection
