@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_index numbers">
            <h1>Your number is …</h1>
            <div class="number_show">
                <h1>{{ $number }}</h1>
            </div>
            <a href="{{ route('game.result', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_start">Send this result</a>
            <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
            <h3 class="information">数字の大きなほうが勝ちじゃ！ゲームの結果を送信するのじゃ！</h3>
        </div>
            <h3 class="number_result">Show result</h2>
    </div>   
@endsection