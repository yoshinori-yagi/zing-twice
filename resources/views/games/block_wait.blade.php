@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_wait">
                <h2>Wait for a moment…</h2>
                <a href="{{ route('users.show', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Back to my profile</a>
                <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
                <h3 class="information">対戦相手のゲームが終了するまで待つのじゃ！</h3>
        </div>
    </div>   
@endsection