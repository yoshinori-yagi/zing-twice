@extends('layouts.app')

@section('content')
    <div class = "game_index">
            <h1>game</h1>
            <div></div>
            <a href="{{ route('game.result', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_start">結果を送信</a>
    </div>
    
@endsection