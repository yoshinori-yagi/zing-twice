@extends('layouts.app')

@section('content')
    <div class = "game_index">
            <h1>gameを選ぶ！！</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Game 1</h3>
                </div>
                <div class="panel-body">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
            <a href="{{ route('game.show', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_start">Gameをはじめる</a>
    </div>
    
@endsection