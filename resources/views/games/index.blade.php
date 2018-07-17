@extends('layouts.app')

@section('content')
<div class="cover">
    <div class = "game_index">
            <h1 class = "testt">Select games</h1>
            <div class="change-btn-wrapper">
                  <div class="change-btn prev-btn">← Previous</div>
                  <div class="change-btn next-btn">Next →</div>
            </div>
            <ul class = "slides">
                <li class= "slide active">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Game 1</h3>
                        </div>
                        <div class="panel-body">
                            <img src="{{ secure_asset("images/numbers.png") }}" alt="">
                        </div>
                        <a href="{{ route('game.numbers', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_start">Start game</a>
                    </div>
                </li>
                <li class = "slide">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Game 2</h3>
                        </div>
                        <div class="panel-body">
                            <img src="{{ secure_asset("images/tetoris.jpg") }}" alt="">
                        </div>
                        <a href="{{ route('game.tetoris', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_start">Start game</a>
                    </div>
                </li>
            </ul>
    </div>
</div>
@endsection