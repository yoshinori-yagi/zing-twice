@extends('layouts.app')

@section('content')
<div class="cover">
    <div class = "game_index">
            <h1 class = "testt">Select games</h1>
            <div class="change-btn-wrapper">
                  <h3 class="change-btn prev-btn">← Previous</h3>
                  <h3 class="change-btn next-btn">Next →</h3>
            </div>
            <ul class = "slides">
                <li class = "slide active">
                    <div class="profile_box">
                            <h2 class="profile_title">Tetoris</h2>
                        <div class="profile_body">
                            <img src="{{ secure_asset("images/tetoris.jpg") }}" alt="">
                        </div>
                        @if($user_point <= 0)
                        <a href="{{ route('users.buy', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_start">Start game</a>
                        @else
                        <a href="{{ route('game.tetoris', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_start">Start game</a>
                        @endif
                    </div>
                </li>
                <li class= "slide">
                    <div class="profile_box">
                            <h2 class="profile_title">Block kuzushi</h2>
                        <div class="profile_body">
                            <img src="{{ secure_asset("images/block.png") }}" alt="">
                        </div>
                        @if($user_point <= 0)
                        <a href="{{ route('users.buy', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_start">Start game</a>
                        @else
                        <a href="{{ route('game.block', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_start">Start game</a>
                        @endif
                    </div>
                </li>
                <li class= "slide">
                    <div class="profile_box">
                            <h2 class="profile_title">Sugoroku</h2>
                        <div class="profile_body">
                            <img src="{{ secure_asset("images/numbers.png") }}" alt="">
                        </div>
                        @if($user_point <= 0)
                        <a href="{{ route('users.buy', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_start">Start game</a>
                        @else
                        <a href="{{ route('game.numbers', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_start">Start game</a>
                        @endif
                    </div>
                </li>
            </ul>
            <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
            <h3 class="information">explanation</h3>
    </div>
</div>
@endsection