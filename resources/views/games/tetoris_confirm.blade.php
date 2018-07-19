@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_confirm">
                <h2>Accept or Refuse ?</h2>
                <a href="{{ route('tetoris.defence', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Start Game</a>
                <a href="{{ route('game.refuse', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Refuse</a>
                <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
                <h3 class="information">explanation</h3>
        </div>
    </div>   
@endsection