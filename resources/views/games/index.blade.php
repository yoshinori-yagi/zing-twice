@extends('layouts.app')

@section('content')
    <div class = "game_index">
            <h1>gameを選ぶ！！</h1>
            <div></div>
            <a href="{{ route('game.show', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_start">Gameをはじめる</a>
    </div>
    
@endsection