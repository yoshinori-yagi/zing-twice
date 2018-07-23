@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_confirm">
                <h2>Accept or Refuse ?</h2>
                <a href="{{ route('block.defence', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Start Game</a>
                @if($user_point <= 0)
                <a href="{{ route('users.buy', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Refuse</a>
                @else
                <a href="{{ route('game.refuse', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Refuse</a>
                @endif
                <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
                <h3 class="information">ゲームをRefuseする場合も１０ポイント消費されるので注意じゃ！</h3>
        </div>
    </div>   
@endsection