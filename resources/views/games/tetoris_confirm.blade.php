@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_confirm">
                <h2>Accept or Refuse ?</h2>
                <a href="{{ route('tetoris.defence', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Start Game</a>
                <a href="{{ route('game.refuse', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Refuse</a>
        </div>
    </div>   
@endsection