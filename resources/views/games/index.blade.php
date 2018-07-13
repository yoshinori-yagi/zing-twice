@extends('layouts.app')

@section('content')
<div class="cover">
    <div class = "game_index">
            <h1>Select games</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Game 1</h3>
                </div>
                <div class="panel-body">
                    <img src="{{ secure_asset("images/numbers.png") }}" alt="">
                </div>
                <a href="{{ route('game.numbers', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_start">Start game</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Game 2</h3>
                </div>
                <div class="panel-body">
                    <img src="{{ secure_asset("images/tetoris.jpg") }}" alt="">
                </div>
                <a href="{{ route('game.tetoris', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_start">Start game</a>
            </div>
    </div>
</div>
@endsection