@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_result">
                <h2>game result</h2>
                @if ($user_id_score > $team_id_score)
                <h1 class = "result">Win, seat change</h1>
                <a href="{{ route('seat', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg">See updated seats</a>
                <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
                <h3 class="information">おめでとう！勝負に勝ったみたいじゃ！</h3>
                @else
                <h1 class = "result">Lose, no seat change</h1>
                <a href="{{ route('seat', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg">Back seat page</a>
                <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
                <h3 class="information">残念！負けたので席はそのままなのじゃ！</h3>
                @endif
        </div>
    </div>   
@endsection